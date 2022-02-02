<!DOCTYPE html>
<html>
<body onload="index.php">
<?php
    session_start();
    session_destroy();
    echo "<script>alert('You have logged out!')</script>";
    echo "<script>window.location.href='index.php'</script>";
?>
</body>
</html>