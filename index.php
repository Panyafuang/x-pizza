<?php
    echo $_SERVER['SCRIPT_FILENAME'];

    // include connect file
    include('config/connect_sqli.php');

    // write query
    $sql = "SELECT title, ingredients, created_at, id FROM pizzas ORDER BY created_at";

    // make query
    $result = mysqli_query($conn, $sql);

    // fetch all the resulting rows as an array
    $arrPizzas = mysqli_fetch_all($result, MYSQLI_ASSOC); 


    // free result from memory
    mysqli_free_result($result);

    // close connection
    mysqli_close($conn);

// print_r($arrPizzas);
// The result. //
//     Array
// (
//     [0] => Array
//         (
//             [title] => chocolate pizza
//             [ingredients] => chocolate, banana, litchi
//             [created_at] => 2019-11-01 21:57:34
//             [id] => 1
//         )

//     [1] => Array
//         (
//             [title] => mango pizza
//             [ingredients] => mango, tomato
//             [created_at] => 2019-11-01 22:26:13
//             [id] => 2
//         )

//     [2] => Array
//         (
//             [title] => tuna pizza
//             [ingredients] => tuna, tomato, cheese, eggs
//             [created_at] => 2019-11-02 12:47:01
//             [id] => 3
//         )

// )

    // print_r(explode(',', $arrPizzas[0]['ingredients']));
    
?>
<!DOCTYPE html>
<html lang="en">
    <!-- Nav -->
    <?php include('templates/header.php'); ?>

    <h4 class="center grey-text">Pizza</h4>
    <div class="container">
        <div class="row">

            <?php foreach($arrPizzas as $pizza): ?>

                <div class="col s6 md3">
                    <div class="card">
                        <div class="card-content center">
                        <img src="img/pizza.svg" class="pizza" alt="">
                            <h6 class="center"><?php echo htmlspecialchars($pizza['title']); ?></h6>

<!-- round 1 $pizza = chocolate pizza  john@gmail.com  chocolate, banana, litchi   2019-11-01 21:57:34 -->
<!-- round 2 $pizza = mango pizza     mike@hotmail.co.uk  mango, tomato   2019-11-01 22:26:13 -->

                            <!-- display ingredients lists -->
                            <ul>
                            <?php foreach(explode(',', $pizza['ingredients']) as $ing ): ?>
                                <!-- 0 => chocolate -->
                                <!-- 1 => banan -->
                                <!-- 2 => litchi -->
                                <li><?php echo htmlspecialchars($ing); ?></li>
                            <?php endforeach; ?>
                            </ul>

                            <p class="right-align info"><?php echo htmlspecialchars($pizza['created_at']);?></p>
                        </div>
                        <div class="card-action right-align">
                            <a href="details.php?id=<?php echo $pizza['id'];?>" class="brand-text">more info...</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>

    <!-- Footer -->
    <?php include('templates/footer.php'); ?>
</html>
    
    
