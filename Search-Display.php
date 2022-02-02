<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Products Page</title>
    <link rel="stylesheet" href="style.css">
    <style media="screen">
      .Search{
        margin:2%;
      }
    </style>
  </head>
  <body>
    <div class="header">
      <div id="page-title">
        <button type="button" name="home-button" id="home-button" onclick="document.location.href='index.php'"></button>
        <div class="Account">
          <?php
            session_start();
            if(isset($_SESSION['uid'])){
              echo $_SESSION['username'].
              "<br><button class='buttons' onclick=\"window.location.href='logout.php'\">Logout</button>";
            }
          ?>
        </div>
        <h1>BeSanta : Donation System</h1>
        <p class="slogan">Let's be someone's Santa!</p>
      </div>
    </div>

    <div class="main-container">
      <br>
      <div class="Search">
        <label>Search </label>
        <input type="search" name="search-bar" value="" placeholder="search your products here" style="width:20%;">
        <input type="submit" name="search-submit" value="🔍" style="border:0px; background-color:inherit;">
      </div>

      <div class="Product-list">
        <h2>Search result...</h2>
        <?php
          $conn = mysqli_connect('localhost','root','','donationsystem');
          if($conn){
            //echo "Connection successful";
            //die("Connection Failed : ". $conn->connect_error);
            $query = "select * from items";
            $result = $conn->query($query);

            if($result->num_rows > 0)
            {
              while($row = $result->fetch_assoc()){
                echo "<div class='item-block'>".
                $row["item_name"]."<br>".
                $row["category"]."<br>".
                $row["brand"]."<br>".
                $row["quantity"]."<br>".
                $row["item_weight"]."<br>"
                ."</div>";

                /*echo
                "<tr>".
                "<td>".$row["ProjectID"]."</td>".
                "<td>".$row["Project_Title"]."</td>".
                "<td>".$row["StartDate"]."</td>".
                "<td>".$row["EndDate"]."</td>".
                "<td>".$row["Project_status"]."</td>".
                "<td>".$row["technologies"]."</td>".
                "<td>".$row["projectClient"]."</td>".
                "</tr>";
              }
              echo "</table>";*/
              }
            }
            else{
              echo "No items available";
            }
          }
          else{
            echo "Connection Failed!";
          }
          $conn->close();
        ?>
      </div><br>
    </div>

    
  </body>
</html>
