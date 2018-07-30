<?php defined('ROOT_DIR') or exit; ?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="<?= ROOT_URI ?>/assets/styles/style.css">
</head>
<body>


    <form action="?change" method="post">
        <div class="input_group">
            <label>Name :
                <input type="text" name="name">
            </label><br/><br/
        </div>
        <div class="input_group">
            <label>Old Password :
                <span></span>
                <input type="password" name="password_1">
            </label><br/><br/>
        </div>
        <div class="input_group">
            <label>New Password :
                <span></span>
                <input type="password" name="password_2">
            </label><br/><br/>
        </div>
        <div class="input_group">
            <input type="submit" name="save" value="Save">
        </div>
    </form>
</body>
</html>
