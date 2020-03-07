<?php

defined('_IN_APP_')  or die('access denied');

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>


    <!-- memanggil assets css -->
    <link rel="stylesheet" href="assets/login.css">
</head>

<body>
    <form action="<?php echo SITE_URL; ?>/login.php" method="POST">
        <?php if (isset($error)) { ?>
        <div class="alert">
            <p>
                ERROR ! <?php echo $error; ?>
            </p>
        </div>
        <?php }  ?>
        <div>
            <label for="username"> Username :
            </label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password"> Password :
            </label>
            <input type="password" name="password" id="password">
        </div>
        <div>
            <button type="submit" name="login" value="login"> login now
            </button>

        </div>
    </form>
</body>

</html>