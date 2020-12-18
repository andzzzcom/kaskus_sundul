<?php
error_reporting(0);

$username = $_GET['user'];
$password = $_GET['pass'];
$link = $_GET['link'];

$cookie = "cookie.txt";
$loginUrl = 'https://m.kaskus.co.id/user/login/';
$arraynama = array();
$arraypassword = array();

$ch = curl_init();

$ch = open($ch, $loginUrl);

$totalline=0;
foreach(file($file) as $line) 
{
	$source =  explode(' ',$line);
	
	array_push($arraynama, $source[0]);
	array_push($arraypassword, $source[1]);
	
	$totalline++;
}


$ch = login($ch, $username, $password, $cookie);

$content = curl_exec($ch);
if(strpos($content, "logging in") !== false)
{

}else
{
	echo"gagal";
	die();
	
}

$url = "https://fjb.kaskus.co.id/product/".$link;
$ch = open($ch,$url);
$content = curl_exec($ch);

$code = getcode($content);


$url = "https://fjb.kaskus.co.id/fjb/sundul/";

$ch = open($ch, $url);
$ch = sundul($ch,$link , $code, $cookie);


$content = curl_exec($ch);


echo $content;




curl_close($ch);

unlink("/".$cookie);





function open($ch, $url)
{
	curl_setopt( $ch, CURLOPT_URL, $url);
	curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false);
	
	return $ch;
}

function login($ch, $username, $password, $cookie)
{
	curl_setopt( $ch, CURLOPT_POST, 1);

	curl_setopt( $ch, CURLOPT_POSTFIELDS, 'identifier='.$username.'&password='.$password );
	
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt( $ch, CURLOPT_COOKIESESSION, true );
	curl_setopt( $ch, CURLOPT_COOKIEJAR, '/'.$cookie   );
	curl_setopt( $ch, CURLOPT_COOKIEFILE, '/'.$cookie  );
	
	return $ch;
}

function sundul($ch, $post, $token, $cookie)
{
	curl_setopt( $ch, CURLOPT_POST, 1);

	curl_setopt( $ch, CURLOPT_POSTFIELDS, 'post_id='.$post.'&securitytoken='.$token );
	
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt( $ch, CURLOPT_COOKIESESSION, true );
	curl_setopt( $ch, CURLOPT_COOKIEJAR, '/'.$cookie   );
	curl_setopt( $ch, CURLOPT_COOKIEFILE, '/'.$cookie  );;
	
	return $ch;
}


function getcode($content)
{
	$temp = explode('laku Gan?',htmlentities($content));
	
	$temp2 = explode("Ya",$temp[1]);
	
	$codenya = substr($temp2[0],257,43);
	return $codenya;
}
?>