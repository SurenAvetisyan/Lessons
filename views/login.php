<?php defined('ROOT_DIR') or exit; ?>
<html>
<head>
    <title>Our Social Site</title>
    <link rel="stylesheet" type="text/css" href="<?= ROOT_URI ?>/assets/styles/style.css">
</head>
<body>
<div class="error">
    <?php
    foreach ($error as $value) {
        echo $value . "<br />";
    }
    ?>
</div>

<form action="?login" method="post" enctype="multipart/form-data">
    <h1>Login Page</h1>
    <div class="input_group">
    <label>Email:
        <span></span>
        <input type="email" name="email" value="<?= $email ?>">
    </label>
    </div>
    <div class="input_group">
    <label>Password :
        <span></span>
        <input type="password" name="password">
    </label>
    </div>
    <div class="input_group">
    <input type="submit" name="send" value="Send">
    </div>
</form>
</body>
</html>