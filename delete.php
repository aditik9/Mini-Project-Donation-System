<?php
    $item_name = $_POST['item_name'];
    $category = $_POST['category'];

    $conn = mysqli_connect('localhost','root','','donationsystem');
    if($conn){
        if(isset($item_name) && isset($category))
        {
            $stmt = $conn->prepare("delete from items where item_name = ? and category = ?");
            $stmt->bind_param("ss",$item_name,$category);
            $stmt->execute();
            $result = $stmt->get_result();
            echo "<script>alert('Item Deleted successfully')</script>";
            echo "<script>window.location='./#items-display'</script>";
        }
        else{
            echo "Deletion unsuccessfull! Please try again";
        }
    }
    else{
        echo "Connection Failed";
    }
?>