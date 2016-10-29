<?php
	$artistName='ColdPlay';
	$songName='The Scientist';
	require('auth/musixmatchCred.php');
	$curl=curl_init();
	$httpURL='http://api.musixmatch.com/ws/1.1/track.search';
	$optionsFirstPart=array(
		'apikey'=>$musixmatchAPIKey,
		'format'=>'json'
	);
	$optionsSecondPart=array(
		'q_artist'=>$artistName,
		'q_track'=>$songName,
		'f_has_lyrics'=>'1',
		'page'=>'1',
		'page_size'=>'1',
		's_track_rating'=>'desc'
	);
	
	$httpURL=$httpURL . '?' . http_build_query($optionsFirstPart) . '?' .http_build_query($optionsSecondPart);
	curl_setopt($curl,CURLOPT_URL,$httpURL);
	$contents=curl_exec($curl);
	echo "$contents\n";
?>