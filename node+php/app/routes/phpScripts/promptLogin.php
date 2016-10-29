<?php
	require_once __DIR__ . '/vendor/autoload.php';
	require('auth/facebookCred.php');

	$fb=new Facebook\Facebook([
		'app_id' => $AppID,
		'app_secret' => $AppSecret,
		'default_graph_version' => $GraphVersion
		]);

	$helper=$fb->getRedirectLoginHelper();
	try{
		$accessToken=$helper->getAccessToken();
	}
	catch(Facebook\Exceptions\FacebookResponseExceptions $e){
		echo 'Graph returned an error: ' . $e->getMessage();
		exit;
	}
	catch(Facebook\Exceptions\FacebookSDKException $e){
		echo 'Facebook SDK returend an error: ' . $e->getMessage();
		exit;
	}

	if(isset($accessToken)){
		print json_encode('{"accessToken":' . $accessToken . '}');
	}
	else{
		print json_encode('{"accessToken": }');
	}