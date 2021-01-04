<?php
error_reporting(0);
//http://localhost/api_player/get.php?canal=afazenda

//try{$url = base64_decode($_GET["url"]);}catch(Exception $e){$url = $_GET["url"];}

$url = $_GET["url"];
$void = $_GET["void"];
$id= $_GET["id"];

$player_rc_void = 'https://drkjaqjbzojf9.cloudfront.net/';

$player_gdrive = 'https://justvideo.me/video/';

//$proxy = '187.87.38.28';
//$port = '53281';

function my_curl($url, $referer) {
	$curl = curl_init();
	
	$headers = [
		'Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5',
		'Cache-Control: max-age=0',
		'Connection: keep-alive',
		'Keep-Alive: 300',
		'Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7',
		'Accept-Language: en-us,en;q=0.5'
		//'X-Forwarded-For: '.$_SERVER['REMOTE_ADDR']
		];
	//opcaional
	//curl_setopt($curl, CURLOPT_PROXY, $proxy);
	//curl_setopt($curl, CURLOPT_PROXYPORT, $port);
	///////////////////////////////////////////////
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.75 Safari/537.36');
	curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($curl, CURLOPT_REFERER, $referer);
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
	//curl_setopt($curl, CURLOPT_ENCODING, 'gzip,deflate');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_TIMEOUT, 10);
	//if (!$html = curl_exec($curl)) { $html = file_get_contents($url); }
	$html = curl_exec($curl);
	curl_close($curl);
	return $html;
}

if (strpos($url, 'http://www.mediafire.com/') !== false) {
	$html = my_curl($url, 'http://www.mediafire.com/');
	preg_match_all('/aria-label="Download file"\n.+href="(.*)"/', $html, $matches);
	//print_r($matches);
	$result = urldecode($matches[1][0]);
	//echo $result;
	header('Location:'.$result);
}elseif (strpos($url, 'https://www.mediafire.com/') !== false) {
	$html = my_curl($url, 'https://www.mediafire.com/');
	preg_match_all('/aria-label="Download file"\n.+href="(.*)"/', $html, $matches);
	//print_r($matches);
	$result = urldecode($matches[1][0]);
	//echo $result;
	header('Location:'.$result);
}elseif (!empty($id)){
	$html = my_curl($player_gdrive.$id, $player_gdrive.$id);
	preg_match_all('/file":"(.*?)","label":"1080P",/', $html, $match1080p);
	preg_match_all('/file":"(.*?)","label":"720P",/', $html, $match720p);
	preg_match_all('/file":"(.*?)","label":"360P",/', $html, $match360p);
	$_1080p = urldecode($match1080p[1][0]);
	$_720p = urldecode($match720p[1][0]);
	$_360p = urldecode($match360p[1][0]);
	if(!empty($_1080p)){	
		header('Location:'.$_1080p);
	}elseif(!empty($_720p)){
		header('Location:'.$_720p);
	}elseif(!empty($_360p)){
		header('Location:'.$_360p);
	} else {
		echo 'vazio';
	}
}else{
	echo 'url invalida';
}

?>