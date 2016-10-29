<?php
	if(!session_id()) {
	    session_start();
	}
	require_once __DIR__ . '/vendor/autoload.php';
	require('auth/facebookCred.php');
	use Facebook\FacebookRequest;

	$fbApp=new Facebook\FacebookApp($AppID,$AppSecret);
	$fb=new Facebook\Facebook([
		'app_id' => $AppID,
		'app_secret' => $AppSecret,
		'default_graph_version' => 'v2.3']);

	function getFriends(string $accessToken,Facebook\FacebookApp $fbApp,Facebook\Facebook $fb){
		$request = new FacebookRequest(
			$fbApp,
			$accessToken,
			'GET',
			'/me/friends'
		);
		try{
			$response=$fb->getClient()->sendRequest($request);
			// var_dump($response);
			$graphObject=$response->getGraphEdge();
			// var_dump($graphObject);
			echo "$graphObject";
		}
		catch(\Facebook\Exceptions\FacebookSDKException $e){
			echo 'Error: ' . $e->getMessage();
			exit;
		}
	}

	$accessToken=(string)($argv[1]);
	if(isset($accessToken)){
		echo "$accessToken\n";
		getFriends($accessToken,$fbApp,$fb);
	}
	else{
		echo 'Error: No accessToken passed.';
	}
