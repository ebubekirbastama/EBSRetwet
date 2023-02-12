<?php

$idList = array("", ""); //retwet  idleri gelecek
$queryId = "";
$Bearer = "";
$Cookie = "";
$XcsrfToken = "";
foreach ($idList as $value) {
    Retwet($value, $queryId, $Cookie, $XcsrfToken, $Bearer);
}

function Retwet($source_tweet_idi, $queryId, $Cookie, $XcsrfToken, $Bearer) {
    // Ebubekir Bastama https://www.ebubekirbastama.com
    $ch = curl_init();
    $PostRequest = "{\"variables\":{\"source_tweet_id\":\"$source_tweet_idi\",\"dark_request\":false},\"queryId\":\"$queryId\"}";


    curl_setopt($ch, CURLOPT_URL, 'https://api.twitter.com/graphql/' . $queryId . '/DeleteRetweet');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $PostRequest);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

    $headers = array();
    $headers[] = 'Authority: api.twitter.com';
    $headers[] = 'Accept: */*';
    $headers[] = 'Accept-Language: tr-TR,tr;q=0.9,en-US;q=0.8,en;q=0.7';
    $headers[] = 'Authorization: ' . $Bearer . '';
    $headers[] = 'Cache-Control: no-cache';
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Cookie: ' . $Cookie . ' ';
    $headers[] = 'Origin: https://twitter.com';
    $headers[] = 'Pragma: no-cache';
    $headers[] = 'Referer: https://twitter.com/';
    $headers[] = 'Sec-Ch-Ua: \"Not_A Brand\";v=\"99\", \"Google Chrome\";v=\"109\", \"Chromium\";v=\"109\"';
    $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
    $headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
    $headers[] = 'Sec-Fetch-Dest: empty';
    $headers[] = 'Sec-Fetch-Mode: cors';
    $headers[] = 'Sec-Fetch-Site: same-site';
    $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36';
    $headers[] = 'X-Csrf-Token: ' . $XcsrfToken . '';
    $headers[] = 'X-Twitter-Active-User: yes';
    $headers[] = 'X-Twitter-Auth-Type: OAuth2Session';
    $headers[] = 'X-Twitter-Client-Language: tr';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);

    curl_close($ch);
    print_r($result."<br/>");
}
