<?php
    $blog = [
        ['news', 'john', 'lorem', 30],
        ['sport', 'max', 'lorem', 10],
        ['agiculture', 'mike', 'lorem', 20]
    ];

    // print_r($blog[1][0]);


    //
    // ─── LOOP ───────────────────────────────────────────────────────────────────────
    //
    $fruits = ["apple", "mango", "dragonfruit", "coconut1", "coconut"];
    
    $products = [
        ['name' => 'coconut', 'price' => 99],
        ['name' => 'dragon fruit', 'price' => 199],
        ['name' => 'pear', 'price' => 20],
        ['name' => 'litchi', 'price' => 89],
        ['name' => 'guava', 'price' => 999]
    ];

    // for($i = 0; $i < count($fruits); $i++){
    //     echo $fruits[$i]. '<br/>';
    // }

    foreach($fruits as $fruit){
        echo $fruit.'<br/>;
    }
    

    // foreach($products as $product){
    //     echo $product['name'].' - '.$product['price'] . '<br/>';
    // }

    // echo true == '1';
    // echo false == '';

    //
    // ─── CONTINUE & BREAK ───────────────────────────────────────────────────────────────────
    //

    // foreach($products as $product){
    //     // Break
    //     if($product['name'] === 'litchi'){
    //         break;
    //     }

    //     echo $product['name'] . '<br />';
    // }


    //
    // ─── FUNCTION ───────────────────────────────────────────────────────────────────
    //

    // function formatProduct($product){
    //     return "{$product['name']} costs {$product['price']} bath to buy.<br/>";
    // }

    // $format = formatProduct(['name' => 'guava', 'price' => 100]);
    // echo $format;

    // foreach($products as $product){
    //     echo "${$product['name']}<br/>";
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');

        body{
            font-family: 'Roboto', sans-serif;
        }
    </style>
    <title>Document</title>
</head>
<body>

</body>
</html>