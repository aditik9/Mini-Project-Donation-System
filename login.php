<!DOCTYPE html>
<html>
  <body>
    <?php
      session_start();

      $email = $_POST['email'];
      $password = $_POST['password'];

      $conn = mysqli_connect('localhost','root','','donationsystem');
      if($conn){
        //die("Connection Failed : ". $conn->connect_error);
        $stmt = $conn->prepare("select * from user where email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows>0){
          $data = $stmt_result->fetch_assoc();
          $_SESSION['uid'] = $data['uid'];
          $_SESSION['username'] = $data['username'];

          if($data['password'] === $password)
          {
            echo "<script>alert('Login Successful')</script>";
            echo "<script>window.location.href='index.php'</script>";
          }
          else {
            echo "Invalid Email OR Password <br>";
            echo "<button onclick='history.back()'>Try Again</button>";
          }
        }
        else {
          echo "Invalid Email OR Password<br>";
          echo "<button onclick='history.back()'>Try Again</button>";
        }
      }
      else{
        echo "Connection Failed";
      }
     ?>

  </body>
</html>