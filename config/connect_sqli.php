<?php

 // MySQLi
    $conn = mysqli_connect('localhost', 'ex', '1234', 'x_pizza');

    // check connection
    if(!$conn){
        echo 'Connection error:'.mysqli_connect_error();
    }
?>