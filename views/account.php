<?php defined('ROOT_DIR') or exit; ?>
<html>
<head>
    <title>Our Social Site</title>
    <link rel="stylesheet" href="<?= ROOT_URI ?>/assets/styles/style.css">
</head>
<body>
</body>
<?php if ($user_img) : ?>
    <img src="<?= $user_img ?>" class="user" alt="<?= $user_data['email'] ?>">
<?php endif; ?>
<div><h3>user : <?= $user_data['name'] ?></h3></div>
<div><h3>email : <?= $user_data['email'] ?></h3></div>
<form method="post" action="?account">
<input type="submit" name="change" value="change">
</form>

<a href="?logout">logout</a>


<?php



?>

</body>
</html>