<?php
include 'settings.php';
$client_id = $i_i;
$externalImg = htmlspecialchars($_POST['urlToImg']);

if (!isset($_FILES['chximg']) && !isset($externalImg) || $_FILES['chximg']['error'] == UPLOAD_ERR_NO_FILE && !isset($externalImg)) {
    echo json_encode(array("error" => "No file uploaded and no external image URL provided")); // what for
    die();
} else {
    if (isset($_FILES['chximg']) && !empty($_FILES['chximg']['tmp_name'])) {
        $image = file_get_contents($_FILES['chximg']['tmp_name']);
        if ($image === false) {
            echo json_encode(array("error" => "Failed to read uploaded file"));
            die();
        }
    } elseif (!empty($externalImg)) {
        $image = file_get_contents($externalImg);
        if ($image === false) {
            echo json_encode(array("error" => "Failed to download image from external URL"));
            die();
        }
    } else {
        echo json_encode(array("error" => "No file uploaded and no external image URL provided"));
        die();
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

    if (curl_error($ch)) {
        die('Curl error: ' . curl_error($ch));
    }

    curl_close($ch);

    $reply = json_decode($reply);

    $link = $reply->data->link;

    $ext = strtolower(pathinfo($link, PATHINFO_EXTENSION));

    if ($ext === 'png') {
        $pngImage = imagecreatefrompng($link);

        $width = imagesx($pngImage);
        $height = imagesy($pngImage);
        $hasTransparency = false;

        for($x = 0; $x < $width; $x++) {
            for($y = 0; $y < $height; $y++) {
                $rgba = imagecolorat($pngImage, $x, $y);
                $colors = imagecolorsforindex($pngImage, $rgba);
                if ($colors['alpha'] > 0) {
                    $hasTransparency = true;
                    break 2;
                }
            }
        }

        imagedestroy($pngImage);

        if ($hasTransparency) {
            $thumbnail = $link;
        } else {
            $thumbnail = substr_replace($link, 'l', -4, 0);
        }
    } elseif ($ext === 'gif') {
        $thumbnail = $link;
    } else {
        $thumbnail = substr_replace($link, 'l', -4, 0);
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