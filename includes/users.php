<?php
$users_file = glob(ROOT_DIR . '/users/*.json');

$users = array();
foreach ($users_file as $user) {
    $email = preg_replace('~\.json$~is', '', basename($user));
    $get_users = get_user_data($email);
    if ($get_users){
        $users[$email] = $get_users['name'];
    }

}

unset($get_users);
?>