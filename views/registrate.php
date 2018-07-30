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
<form action="?registrate" method="post" enctype="multipart/form-data">
    <div class="input_group">
    <label>Name :
        <input type="text" name="name">
    </label><br/><br/>
        </div>
    <div class="input_group">
    <label>Email:
        <span></span>
        <input type="email" name="email">
    </label><br/><br/>
    </div>
    <div class="input_group">
    <label>Password :
        <span></span>
        <input type="password" name="password">
    </label><br/><br/>
    </div>
    <div class="input_group">
    <label>File :
        <input type="file" name="file">
    </label><br/><br/>
    </div>
    <div class="input_group">
    <input type="submit" name="send" value="Send">
    </div>
</form>
</body>
</html>