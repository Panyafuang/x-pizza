<?php

$name = "john";

function sayHi(){
    global $name;
    echo "Hi my name is: $name";
}

sayHi();

?>