<!DOCTYPE html>
<html>
<body>
    <?php
        $item_id = $_POST['item_id'];
        $item_name = $_POST['item_name'];
        $category = $_POST['category'];
        $brand = $_POST['brand'];
        //$image = $_POST['item_image];
        $quantity = $_POST['quantity'];
        $item_weight = $_POST['item_weight'];

        $conn=mysqli_connect('localhost','root','','donationsystem');
        if($conn){
            //echo "Connection successfull";
            $stmt = $conn->prepare("update items set item_name=?,category=?,brand=?,quantity=?,item_weight=? where item_id=?");
            $stmt->bind_param("sssiii",$item_name,$category,$brand,$quantity,$item_weight,$item_id);
            $stmt->execute();
            echo "<script>alert('Item Updated successfully')</script>";
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