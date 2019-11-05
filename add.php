<?php    

    // include connect file
    include('config/connect_sqli.php');

    // set all these var to empty string
    $email = $title = $ingredients = '';
    // collect each error
    $errors = array('email' => '', 'title' => '', 'ingredients' => '');

    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $title = $_POST['title'];
        $ingredients = $_POST['ingredients'];

        // email
        if(empty($email)){
            $errors['email'] = 'An email required <br/>';
        }else{
            // validate email
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'email must be a valid email address';
            }

        }

        // title
        if(empty($title)){  
            $errors['title'] = 'A title is require <br/>';
        }else{
            // validate title
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                $errors['title'] = 'title must be letter and spaec only <br/>';
            }

        }

        // ingredients
        if(empty($ingredients)){
            $errors['ingredients'] = 'Ingredients is require <br/>';
        }else{
            // validate ingredients
            if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
                $errors['ingredients'] = 'ingredienst must be separated list by semicolon <br/>';
            }

        }

        //
        // ─── CHECK ERRORS IN FORM ────────────────────────────────────────
        //  
        if(array_filter($errors)){
            // have errors
            // echo 'errors in form';
        }else{
            // don't have errors
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);

            // write sql
            $sql = "INSERT INTO pizzas (title, email, ingredients) VALUES ('$title', '$email', '$ingredients')";

            // save to database and check
            if(mysqli_query($conn, $sql)){
                // noerror
                header('Location: index.php');
            }else{
                // error
                echo 'query error: '.mysqli_error($conn);
            }
        }

    } // end of POST check
?>
<!DOCTYPE html>
<html lang="en">
    <!-- Nav -->
    <?php include('templates/header.php'); ?>

    <!-- Form -->
    <section class="container">
        <h4 class="center">Add a pizza</h4>
        <form class="white" action="add.php" method="POST">
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
            <div class="red-text"><?=$errors['email'];?></div>

            <label for="title">Title: </label>
            <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title); ?>">
            <div class="red-text"><?=$errors['title'];?></div>

            <label for="ingredients">Ingredients(comma separated): </label>
            <input type="text" name="ingredients" id="ingredients" value="<?php echo htmlspecialchars($ingredients); ?>">
            <div class="red-text"><?=$errors['ingredients']?></div>

            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand">
            </div>
        </form>
    </section>

    <!-- Footer -->
    <?php include('templates/footer.php'); ?>
</html>
    
    
