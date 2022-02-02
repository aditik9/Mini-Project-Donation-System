<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>BeSanta</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .navbuttons{
      background-color:#E05D5D;
      border:0px;
      font-size: 95%;
      margin-right:3%;
      color:white;
      font-weight: bold;
    }
    .item-list{
      margin: 3% 3%;
      align-items: center;
      display: grid;
      grid-template-columns: repeat(5,1fr);
      grid-auto-rows:250px;
    }
    .item-block{
      padding: 3% 2%;
      margin: 5%;
      width: 70%;
      height: 200px;
      background-color:white;
 
      border-radius:20px;
      box-shadow: 1px 1px grey;
    }
    .items-display{
      margin: 0% 3%;
    }
    #search-bar{
      padding: 6px 4px; 
      border-width:1px;
      border-radius:10px;
    }
  </style>
</head>

<body>
  <?php session_start(); ?>
  <div class="header">
    <div id="page-title">
      <button type="button" name="home-button" id="home-button" onclick="document.location.href='index.php'"></button>
      <div class="Account">
        <?php
            if(isset($_SESSION['uid'])){
              echo $_SESSION['username'].
              "<br><button class='buttons' onclick=\"window.location.href='logout.php'\">Logout</button>";
            }
            else{
              echo "<button class='buttons' onclick=\"window.location.href='SignUp.html'\">Register</button>
              <button class='buttons' onclick=\"window.location.href='SignIn.html'\">Log In</button>";
            }
        ?>
      </div>
      <h1>BeSanta : Donation System</h1>
      <p class="slogan">Let's be someone's Santa!</p>
    </div>
  </div>
  <div class="nav-bar" style="background-color: #E05D5D; padding:5px;">
    <button type="button" name="who_can_donate" id="who" class="navbuttons" onclick="window.location.href='whoCanDonate.html'">WHO CAN DONATE</button>
    <button type="button" name="what_to_donate" id="what" class="navbuttons" onclick="window.location.href='whatToDonate.html'">WHAT TO DONATE</button>
    <button type="button" name="How_to_donate" id="how" class="navbuttons" onclick="window.location.href='HowToDonate.html'">HOW TO DONATE</button>
  </div>


  <div class="main-container">
    <br>
    <div class="block-buttons-section" id="edit-block-button">
      <!--<button type="button" class="bigButtons" name="search-item-button" id="search-item" onclick="window.location.href='Search-Display.php'">SEARCH<br>ITEM<br></button>-->
      <button type="button" class="bigButtons" name="add-item-button" id="add-item" onclick="window.location.href='AddItem.html'">DONATE<br>ITEM<br></button>
      <button type="button" class="bigButtons" name="delete-item-button" id="delete-item" onclick="window.location.href='DeleteItem.html'">DELETE<br>ITEM<br></button>
      <button type="button" class="bigButtons" name="update-item-button" id="update-item" onclick="window.location.href='UpdateItem.html'">UPDATE<br>ITEM<br></button>
    </div><br>

    <div id="items-display" class="items-display">
      <h2>Items List</h2>
      <div class="Search">
        <form action="" method="POST">
          <label>Search </label>
          <input type="search" id="search-bar" name="search" placeholder=" search your products here" style="width:20%;">
          <input type="submit" id="search-submit" value="🔍" style="border:0px; background-color:inherit;">
        </form>
      </div>
      <div class="item-list">
      <?php
        $conn = mysqli_connect('localhost','root','','donationsystem');
        if($conn){
          if(isset($_POST['search'])){
            $search = $_POST['search'];
            $stmt = $conn->prepare("select * from items where item_name = ?");
            $stmt->bind_param("s",$search);
            $stmt->execute();
            $result = $stmt->get_result();

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "<div class='item-block'>".
                    $row["item_name"]."<br>".
                    $row["category"]."<br>".
                    $row["brand"]."<br>".
                    $row["quantity"]."<br>".
                    $row["item_weight"]."<br>"
                    ."</div>";
                }
            }
            else{
                echo "No search results";
            }
          }
          else{
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
              }
            }
            else{
              echo "No items available";
            }
          }
        }
        else{
          echo "Connection Failed!";
        }
        $conn->close();
      ?>
      </div>
    </div><br>
  </div>

  <div class="footer" id="page-footer">
    <div class="" id="aboutus">
      <h3>About Us</h3>
      <p style="position:relative;">
        We, the team of BeSanta are from Goa, India who help you find the right people for you to donate through this Website
      </p><br>
    </div>

    <div class="" id="Quicklinks">
      <h3>Quick Links</h3>
      <p>
        <a class="links" href="contact.html">Contact Us</a>
        <a class="links" href="Search-Display.html">Search Items</a>
        <a class="links" href="AddItem.html">Add Item</a>
        <a class="links" href="DeleteItem.html">Delete Items</a>
        <a class="links" href="UpdateItem.html">Update Items</a>
      </p>
    </div><br>
  </div>

</body>
</html>
