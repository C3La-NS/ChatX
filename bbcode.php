<?php
/** 
* PHP BBCode Parser
*
* @author Afsal Rahim || modified by C3La-NS
* @link http://digitcodes.com/create-simple-php-bbcode-parser-function/
**/
//BBCode Parser function

function showBBcodes($text) {
    // BBcode array
    $find = array(
        '~\[b\](.+?\S)\s*\[/b\]~s',
        '~\[i\](.+?\S)\s*\[/i\]~s',
        '~\[u\](.+?\S)\s*\[/u\]~s',
        '~\[color=(.*?)\](.+?\S)\s*\[/color\]~s',
		'~\[url\]((?:ftp|https?)://.*?)\[/url\]~s',
		'~\[url=((?:ftp|https?)://.*?)\](.*?)\[/url\]~s',
		'~\[img h=(.*?) d=(.*?)\](https?://i\.imgur\.com.*?\.(?:jpg|jpeg|gif|png|bmp))\[/img\]~s',
		'~((https?|ftps?):\/\/[^"<\s]+(?:\?[^"<\s]*)?(?![^<>]*>|[^"]*?<\/a))~si'
    );

    // HTML tags to replace BBcode
    $replace = array(
        '<b>$1</b>',
        '<i>$1</i>',
        '<span style="text-decoration:underline;">$1</span>',
        '<span style="color:$1;">$2</span>',
        '<a href="$1" target="_blank">$1</a>',
        '<a href="$1" target="_blank">$2</a>',
        '<img class="chatx_img" height="$1" src="$3" data-chxlightbox="$2" />',
        '<a href="$1" target="_blank">$1</a> '
    );

    // Replacing the BBcodes with corresponding HTML tags
    return preg_replace($find, $replace, $text);
}

?>