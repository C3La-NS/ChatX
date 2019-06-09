<?php
include 'settings.php';

$client_id = "b12794161e11f2b";

if(!isset($_FILES['chximg']) || $_FILES['chximg']['error'] == UPLOAD_ERR_NO_FILE) {
    exit();
} else {

$image = file_get_contents($_FILES['chximg']['tmp_name']); 

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
curl_setopt($ch, CURLOPT_POSTFIELDS, array('image' => base64_encode($image)));

$reply = curl_exec($ch);
curl_close($ch);

$reply = json_decode($reply);

echo htmlspecialchars($reply->data->link);

}
?>