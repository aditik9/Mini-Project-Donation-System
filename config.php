<?php
    $conn = mysqli_connect('localhost','root','','donationsystem');
    if($conn){
        echo "Connection successfull";
    }
    else{
        echo "Connection Failed!";
    }
    $q3 = "CREATE TABLE items (item_id integer NOT NULL, item_name varchar(40) NOT NULL,
                              category varchar(15),brand varchar(15),quantity integer(4),
                              item_weight integer(3),
                              primary key(item_id)
                              )";
    $r3 = mysqli_query($conn,$q3);
    if($r3){
        echo "<br>'items' table created successfully";
    }
    else{
        echo "<br>Table creation failed";
    }
    /*
    $q1 = "CREATE TABLE user (uid integer NOT NULL, uname varchar(20) NOT NULL,
                              uemail varchar(40) NOT NULL, user_password varchar(10) NOT NULL,
                              primary key(uid)
                              )";
    $r1 = mysqli_query($conn,$q1);
    if($r1){
        echo "<br>Table created successfully";
    }
    else{
        echo "<br>Table creation failed";
    }

    $q2 = "INSERT INTO user VALUES(1,'Aditi','aditi@gmail.com','123xyz')";
    $r2 = mysqli_query($conn,$q2);
    if($r2){
        echo "<br>Data Inserted successfully";
    }
    else{
        echo "<br>Data Insertion failed";
    }
    
    $q3 = "CREATE TABLE items (item_id integer NOT NULL, item_name varchar(40) NOT NULL,
                              category varchar(15),brand varchar(15),quantity integer(4),
                              item_weight integer(3),
                              primary key(item_id)
                              )";
    $r3 = mysqli_query($conn,$q3);
    if($r3){
        echo "<br>'items' table created successfully";
    }
    else{
        echo "<br>Table creation failed";
    }
    
    */

    mysqli_close($conn);
?>
