<?php
include 'settings.php';
$client_id = "b12794161e11f2b";

$externalImg = htmlspecialchars($_POST['urlToImg']);

if (!isset($_FILES['chximg']) && !isset($externalImg) || $_FILES['chximg']['error'] == UPLOAD_ERR_NO_FILE && !isset($externalImg)) {
    exit();
} else {
    
    if (isset($_FILES['chximg'])) {
        $image = file_get_contents($_FILES['chximg']['tmp_name']);
    } else {
        $image = file_get_contents($externalImg);
    }
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
    curl_setopt($ch, CURLOPT_POST, TRUE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: Client-ID ' . $client_id
    ));
    curl_setopt($ch, CURLOPT_POSTFIELDS, array(
        'image' => base64_encode($image)
    ));
    
    $reply = curl_exec($ch);
    curl_close($ch);
    
    $reply = json_decode($reply);
    
    $link = $reply->data->link;
    
    
    $ext = $link;
    $ext = explode('.', $ext);
    $ext = end($ext);
    
    if ($ext !== png && $ext !== gif) {
        $thumbnail = substr_replace($link, 'l', -4, 0);
    } else {
        $thumbnail = $link;
    }

    if ($reply->data->width > 265) {
        $maxWidth = 265;
    } else {
        $maxWidth = $reply->data->width;
    }
    $resized_width  = $maxWidth;
    $resized_height = ($reply->data->height / $reply->data->width) * $resized_width;
    $resized_height = bcdiv($resized_height, 1, 2);
    
    $arr = array(
        "link" => $link,
        "clientHeight" => $resized_height,
        "thumbnail" => $thumbnail
    );
    echo json_encode($arr);
    
}
?>
