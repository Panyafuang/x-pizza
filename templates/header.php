<?php
    session_start();

    if($_SERVER['QUERY_STRING'] == 'noname'){
        unset($_SESSION['name']);
    }
    // set session
    $name = $_SESSION['name'] ?? 'Guest';

    // set cookie
    $gender = $_COOKIE['gender'] ?? 'unknow';

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        .brand{
            background-color: #cbb09c !important;
        }
        .brand-text{
            color: #cbb09c;
        }
        form{
            max-width: 460px;
            margin: 20px auto;
            padding: 20px;
        }
        .info{
            color: #8e8e8e;
        }
        .pizza{
            width: 100%;
            height: 200px;
            margin: 20px auto -70px;
            display: block;
            position: relative;
            top: -70px;

        }
    </style>
<title>Pizza</title>
</head>
    <body class="grey lighten-4">
        <!-- Nav -->
        <nav class="white">
            <div class="container">
                <a href="index.php" class="brand-log brand-text left"><h4>X-Pizza</h4></a>
                <ul id="nav-mobile" class="right hide-on-small-and-down">
                    <li class="brand-text"><p>Hello <?php echo htmlspecialchars($name) ?></p></li>
                    <li class="brand-text"><p>(<?php echo htmlspecialchars($gender) ?>)</p></li>
                    <li><a href="add.php" class="btn brand">Add Pizza</a></li>
                </ul>
            </div>
        </nav>