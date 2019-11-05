<?php
    // include connect file
    include('config/connect_sqli.php');

    // Delete item
    if(isset($_POST['delete'])){

        $id_to_del = mysqli_escape_string($conn, $_POST['id_to_del']);

        $sql = "DELETE FROM pizzas WHERE id = $id_to_del";

        if(mysqli_query($conn, $sql)){
            // success
            header('Location: index.php');
        }else{
            echo 'query error: '. mysqli_error($conn);
        }
    }


    // Show item
    // Check GET request id param
    if(isset($_GET['id'])){

        $id = mysqli_real_escape_string($conn, $_GET['id']);

        // write sql
        $sql = "SELECT * FROM pizzas WHERE id = $id";

        // get the query result
        $result = mysqli_query($conn, $sql);

        // fetch one result as an array format
        $arrPizzas = mysqli_fetch_assoc($result);

        // free result and close connect
        mysqli_free_result($result);
        mysqli_close($conn);
    }

//     print_r($arrPizzas)
// The result
//     Array
// (
//     [id] => 2
//     [title] => mango pizza
//     [email] => mike@hotmail.co.uk
//     [ingredients] => mango, tomato
//     [created_at] => 2019-11-01 22:26:13
// )
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pizza Details</title>
</head>
<body>
    <?php include('templates/header.php');?>
    <div class="container center">
        <?php if($arrPizzas):?>
            <h4><?php echo htmlspecialchars($arrPizzas['title']);?></h4>
            <p>Created by <?php echo htmlspecialchars($arrPizzas['email']);?></p>
            <p><?php echo date($arrPizzas['created_at']); ?></p>
            <h5>Ingredients:</h5>
            
                <?php foreach(explode(',', $arrPizzas['ingredients']) as $ing): ?>
                    <?php echo htmlspecialchars($ing).","; ?>
                <?php endforeach; ?>  
            
            <!-- DELETE FORM -->
            <form action="details.php" method="POST">
                <input type="hidden" name="id_to_del" value="<?php echo $arrPizzas['id'];?>">
                <input type="submit" value="Delete" class="btn brand" name="delete">
            </form>

        <?php else:?>
            <h5>No such pizza exists🤣</h5>
        <?php endif; ?>
    </div>

    <?php include('templates/footer.php');?>
</body>
</html>