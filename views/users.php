<html>
<head>
    <title></title>
</head>
<body>
<div>
    <?php foreach ($users as $email => $user): ?>
        <a href="?message&user=<?=$email?> "><?=$user?></a><br />
    <?php endforeach; ?>

</div>
</body>
</html>