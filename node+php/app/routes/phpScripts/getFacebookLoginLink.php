<?php
	require_once __DIR__ . '/vendor/autoload.php';
	require('auth/facebookCred.php');

	$fb=new Facebook\Facebook([
		'app_id' => $AppID,
		'app_secret' => $AppSecret,
		'default_graph_version' => $GraphVersion
		]);

	$helper=$fb->getRedirectLoginHelper();
	$permissions=['emai','user_likes'];
	$loginUrl=$helper->getLoginUrl('http://localhost:8080/promptLogin.php',$permissions);
	echo $loginUrl;