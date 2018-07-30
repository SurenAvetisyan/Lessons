<?php
defined('ROOT_DIR') or exit;
$to = isset($_REQUEST['user']) ? $_REQUEST['user'] : "";
if (!$to) {
    return;
}
$file_name = ROOT_DIR . "/message/" . $_SESSION['user_email'] . "--" . $to . ".json";
$file_name_2 = ROOT_DIR . "/message/" . $to . "--" . $_SESSION['user_email'] . ".json";
if (is_file($file_name)) {
    $data = file_get_contents($file_name);
    $data = json_decode($data, true);
} else {
    $data = array();
}
if (is_file($file_name_2)) {
    $data_2 = file_get_contents($file_name_2);
    $data_2 = json_decode($data_2, true);
} else {
    $data_2 = array();
}
$user_1_data = file_get_contents(ROOT_DIR . "/users/" . $_SESSION['user_email'] . ".json");
$user_1_data = json_decode($user_1_data, true);
$user_2_data = file_get_contents(ROOT_DIR . "/users/" . $to . ".json");
$user_2_data = json_decode($user_2_data, true);
if (isset($_POST['send'])) {
    $text = isset($_POST['text']) ? htmlspecialchars($_POST['text']) : "";

    $data[] = array("message" => $text, "date" => time(), 'seen' => 0);

    file_put_contents($file_name, json_encode($data));
    $res = array(
        'status' => 'ok',
        'data' => array('name' => $user_1_data['name'], 'date' => date('d.m.Y G:s')),
    );

    exit(json_encode($res));
} elseif (isset($_POST['get_message'])) {
    $res = array();
    foreach ($data_2 as $val){
        if($val['seen'] == 0){
            $val['user'] = $user_2_data['name'];
            $res[] = $val;
        }
    }
    $seen = false;
    foreach ($data_2 as $key => $val) {
        if (empty($val['seen']) || $val['seen'] == 0) {
            $data_2[$key]['seen'] = time();
            $seen = true;
        }
    }
    if ($seen) {
        file_put_contents($file_name_2, json_encode($data_2));
    }
    exit(json_encode($res));
}

$seen = false;
foreach ($data_2 as $key => $val) {
    if (empty($val['seen']) || $val['seen'] == 0) {
        $data_2[$key]['seen'] = time();
        $seen = true;
    }
}
if ($seen) {
    file_put_contents($file_name_2, json_encode($data_2));
}


$data = array_map(function ($val) use ($user_1_data) {
    $val['user'] = $user_1_data['name'];
    return $val;
}, $data);
$data_2 = array_map(function ($val) use ($user_2_data) {
    $val['user'] = $user_2_data['name'];
    return $val;
}, $data_2);
$data = array_merge($data, $data_2);


usort($data, function ($a, $b) {
    return $a['date'] - $b['date'];
});


?>