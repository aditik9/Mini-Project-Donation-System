<!DOCTYPE html>
<html lang="en">
<body>
    <?php
        
        $item_name = $_POST['item_name'];
        $category = $_POST['category'];
        $brand = $_POST['brand'];
        //$image = $_POST['item_image]
        $quantity = $_POST['quantity'];
        $item_weight = $_POST['item_weight'];

        $conn=mysqli_connect('localhost','root','','donationsystem');
        if($conn){
            //echo "Connection successfull";
            $stmt = $conn->prepare("INSERT INTO items(item_name,category,brand,quantity,item_weight) 
                                    VALUES (?,?,?,?,?)");
            $stmt->bind_param("sssii",$item_name,$category,$brand,$quantity,$item_weight);
            $stmt->execute();
            echo "<script>alert('Item inserted successfully')</script>";
            echo "<script>window.location='./#items-display'</script>";
            $stmt->close();
            mysqli_close($conn);
        }
        else{
            echo "Connection Failed!";
        }
    ?>
</body>
</html>
