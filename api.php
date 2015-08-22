<?php
// error_reporting(-1);
// ini_set('display_errors', 'On');
// your uber settings here
  $client_id= '';
  $client_secret= '';
  $server_token = '';
  $redirect_uri= '';
  $application_url = '';
  $google_maps_key = '';
  // use the uber sandbox
  $uber_api_address = 'https://sandbox-api.uber.com/v1/requests/';

if(isset($_REQUEST['code']))
{
    $code =  $_REQUEST['code'];
    $str = "curl -F 'client_secret=$client_secret' -F 'client_id=$client_id' -F 'grant_type=authorization_code' -F 'redirect_uri=$redirect_uri' -F 'code=$code' https://login.uber.com/oauth/token";
    $var = exec ($str);
    
    $result = json_decode ( $var );
    print_r($result);
    $access_token = $result->access_token;
    setcookie("kanda-hack-app", $access_token, time() + (86400 * 30));
    header("Location: " . $application_url);
}

if(isset($_REQUEST['action'])){
	$user_longitude = isset($_REQUEST['user_longitude']) ? $_REQUEST['user_longitude'] : "";
	$user_latitude  = isset($_REQUEST['user_latitude']) ? $_REQUEST['user_latitude'] : "";
	$destination_longitude = isset($_REQUEST['destination_longitude']) ? $_REQUEST['destination_longitude'] : "";
	$destination_latitude  = isset($_REQUEST['destination_latitude']) ? $_REQUEST['destination_latitude'] : "";
	$product_id = isset($_REQUEST['product_id']) ? $_REQUEST['product_id'] : "";
	$search_term = isset($_REQUEST['query']) ? $_REQUEST['query'] : "";
	$venue_id = isset($_REQUEST['venue_id']) ? $_REQUEST['venue_id'] : "";
	$radius = isset($_REQUEST['radius']) ? $_REQUEST['radius'] : "";
	$max_price = isset($_REQUEST['max_price']) ? $_REQUEST['max_price'] : "";
	$auth_code = isset($_REQUEST['auth_code']) ? $_REQUEST['auth_code'] : "";
	$request_id = isset($_REQUEST['request_id']) ? $_REQUEST['request_id'] : "";
	$term = isset($_REQUEST['term']) ? $_REQUEST['term'] : "";
	$loc = isset($_REQUEST['loc']) ? $_REQUEST['loc'] : "";
	$addr = isset($_REQUEST['addr']) ? $_REQUEST['addr'] : "";
	
	switch($_REQUEST['action']){
		case 'get_products':
		    echo $user_longitude.$user_latitude;
			if($user_longitude && $user_latitude){
			    echo "yes";
				getProducts($user_longitude, $user_latitude);
				
			}
			
		break;
		
		case 'auth_url':
		      $redirect_uri = urlencode($redirect_uri);
		    header("Location: https://login.uber.com/oauth/authorize?response_type=code&client_id=$client_id&scope=request&redirect_uri=$redirect_uri");
		    break;
		case 'record_coords':
			recordCoords($user_latitude, $user_longitude);
			break;
		case 'get_prices':

			$price_to_venue = getPrices($user_longitude, $user_latitude, $destination_longitude, $destination_latitude);
			print_r(json_encode($price_to_venue));
		break;
		case 'get_times':
			getTimes($user_longitude, $user_latitude, $product_id);
		break;
		case 'cancel':
			cancelRequest($request_id);
			break;
		case 'request':
			request($product_id, $user_longitude, $user_latitude, $destination_longitude, $destination_latitude,$auth_code);
		break;
		case 'formatted_price':
			formatted_price($userLon, $userLat, $dest_lon, $dest_lat);
		break;
		case 'yelp':
			yelp_search($term, $loc);
		break;
		case 'addr_to_coords':
			addr_to_coords($addr);
			break;
	}
} else{
	return 'nope!';
}

function addr_to_coords($addr)
{
	$addr = str_replace( " ", "+", $addr);
	$handle = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?address=$addr&key=$google_maps_key");
	print_r($handle);
}

function yelp_search($term, $loc)
{
	require_once('./yelp/yelp_api_wrapper.php');
	$parameters = array('term' => $term, 'location' => $loc, 'limit' => 10);
 	$retArr =  $yelp_api->search_query($parameters);
 	print_r(json_encode($retArr));
}

function getAuthURL()
{
	global $redirect_uri;
	global $client_id;
	$redirect_uri = urlencode($redirect_uri);
    return "https://login.uber.com/oauth/authorize?response_type=code&client_id=$client_id&scope=request&redirect_uri=$redirect_uri";
		    
}

function recordCoords($lat, $lon)
{
	setcookie('uber-location', $lat.",".$lon,  time() + (60 * 5));
	$coords  = file_get_contents("https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lon&key=$google_maps_key");
	$result = json_decode($coords);
	echo $coords;
	setcookie('uber-location-address', $result -> results[0] -> formatted_address,  time() + (60 * 5));
}

function getProducts($user_longitude, $user_latitude){
    echo "here";
	$ch = curl_init();
	$headr = array();
// 	$headr[] = 'Content-length: 0';
	$headr[] = 'Content-type: application/json';
	$headr[] = 'Authorization: Token IEq8T9sAZpAafXEHJ58amGGOiKPcsmmMhOzg86ku';
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
	curl_setopt($ch, CURLOPT_URL, 'https://api.uber.com/v1/products?latitude='.$user_latitude.'&longitude='.$user_longitude);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$data = curl_exec($ch);
	curl_close($ch);
	echo "nope";
	$output_data = json_decode($data);
	$final_products = array();

	$ch_time = curl_init();
	$headr_time = array();
	$headr_time[] = 'Content-length: 0';
	$headr_time[] = 'Content-type: application/json';
	if($_COOKIE["kanda-hack-app"])
	{
		$headr_time[] = "Bearer: Token ". $_COOKIE["kanda-hack-app"];
	}
	else{
		$headr_time[] = "Authorization: Token F9Q2f1pBl01ORbVd6xAapnRKNKqROu8OjetHuidx";
	}
	curl_setopt($ch_time, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch_time, CURLOPT_HTTPHEADER,$headr_time);
	curl_setopt($ch_time, CURLOPT_URL, 'https://api.uber.com/v1/estimates/time?start_latitude='.$user_latitude.'&start_longitude='.$user_longitude);
	curl_setopt($ch_time, CURLOPT_SSL_VERIFYPEER, false);
	$times = curl_exec($ch_time);
	curl_close($ch_time);
	$decoded_times = json_decode($times);

	foreach($output_data->products as $product){
		$product->description = str_replace('and Boro-Taxi ','',$product->description);
		switch($product->display_name){
			case 'uberT':
			$product->image = 'app/img/uber-taxi.png';
			break;
			case 'uberX':
			$product->image = 'app/img/uber-x.png';
			break;
			case 'uberXL':
			$product->image = 'app/img/uber-xl.png';
			break;
			case 'UberSUV':
			$product->image = 'app/img/uber-suv.png';
			break;
			case 'UberBLACK':
			$product->image = 'app/img/uber-black.png';
			break;
		}
		foreach($decoded_times->times as $time){
			if($time->product_id == $product->product_id){
				$minutes = ceil($time->estimate / 60);
				$product->estimatedTime = $time->estimate;
				$product->minutes = $minutes;
				$final_products[] = $product;
			}
		}
	}
	print_r( json_encode($final_products) );
}

function getTimes($user_longitude, $user_latitude, $product_id){
	$ch = curl_init();
	$headr = array();
	$headr[] = 'Content-length: 0';
	$headr[] = 'Content-type: application/json';
	$headr[] = "Authorization: Token F9Q2f1pBl01ORbVd6xAapnRKNKqROu8OjetHuidx";
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
	curl_setopt($ch, CURLOPT_URL, 'https://api.uber.com/v1/estimates/time?start_latitude='.$user_latitude.'&start_longitude='.$user_longitude.'&product_id='.$product_id);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

	$data = curl_exec($ch);

	curl_close($ch);
	return json_decode($data);
}

function getPrices($start_longitude, $start_latitude, $end_longitude, $end_latitude){
	// echo 'start_long' . $start_longitude .'<br/>';
	// echo 'start_lat' . $start_latitude .'<br/>';
	// echo 'dest_long' . $end_longitude . '<br/>';
	// echo 'dest_lat' . $end_latitude . '<br/>';
	// echo 'https://api.uber.com/v1/estimates/price?start_latitude='.$user_latitude.'&start_longitude='.$user_longitude.'&end_latitude='.$destination_latitude.'&end_longitude='.$destination_longitude;

	$ch = curl_init();
	$headr = array();
	$headr[] = 'Content-length: 0';
	$headr[] = 'Content-type: application/json';
	$headr[] = "Authorization: Token F9Q2f1pBl01ORbVd6xAapnRKNKqROu8OjetHuidx";
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER,$headr);
	curl_setopt($ch, CURLOPT_URL, 'https://api.uber.com/v1/estimates/price?start_latitude='.$start_latitude.'&start_longitude='.$start_longitude.'&end_latitude='.$end_latitude.'&end_longitude='.$end_longitude);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$data = curl_exec($ch);
	curl_close($ch);
	return json_decode($data);
}

function request($product_id, $start_longitude, $start_latitude, $end_longitude, $end_latitude, $auth_code)
{
	
	$ch = curl_init();
	$headr = array();
	$headr['product_id'] = $product_id;
	$headr['start_longitude'] = $start_longitude;
	$headr['start_latitude'] = $start_latitude;
	$headr['end_longitude'] = $end_longitude;
	$headr['end_latitude'] = $end_latitude;
	
	$str = "curl -X POST -H \"Content-type: application/json\" -H \"Authorization: Bearer $auth_code\" -d '".json_encode($headr)."' $uber_api_address";
	$var = exec ($str);
    
    // $result = json_decode ( $var );
    print($var);
    // return ($result);
}

function cancelRequest($request_id)
{
	global $auth_code;

	$str = "curl -X DEL -H \"Content-type: application/json\" -H \"Authorization: Bearer $auth_code\" $uber_api_address$request_id";
	$var = exec ($str);
	if($var == "{}")
		echo "success";
	else
		echo "failure";
	
}	

function GeoCode($address)
{
	// $address = '1600 Pennsylvania Av, Washington, DC';
    printf("Get geocode for address: %s\n",$address);

    // Chose your method, with or without user info
    $wsdl = 'http://geocoder.us/dist/eg/clients/GeoCoderPHP.wsdl';
    //$wsdl = 'http://username:password@geocoder.us/dist/eg/clients/GeoCoderPHP.wsdl';

    // Make the connection
    $client = new SoapClient($wsdl);

    // Use this to see what services are available
    //var_dump($client->__getFunctions());

    // Actually call the service
    $result = $client->geocode($address);
    // var_dump($result);
    return [$result["lat"], $result["long"]];
}

?>