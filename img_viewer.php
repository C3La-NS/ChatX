<?php
if (isset($_GET['url'])) {
    function gets($url){
        $userAgent = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/62.0.3202.94 Safari/537.36';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
        $filename = basename($url);
        $file_extension = strtolower(substr(strrchr($filename,"."),1));
    
        switch( $file_extension ) {
            case "gif": $ctype="image/gif"; break;
            case "png": $ctype="image/png"; break;
            case "jpeg":
            case "jpg": $ctype="image/jpeg"; break;
            default:
        }
    
        header('Content-type: ' . $ctype);
        echo $output = curl_exec($ch);
        curl_close($ch);
    }
    
    $imageUrl = $_GET['url'];
    $img = $imageUrl;
    gets($img);
} else {
    echo "no image found!";
}
?>