<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta charset='utf-8'>
<link rel="stylesheet" href="./map.css">
<script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?clientId=jZawGNWf455qVfd4tYvK"></script>
</head>
<body>

<?php
	/*	$client_id = "jZawGNWf455qVfd4tYvK";
  	$client_secret = "mJCq1wh55u";
  	$encText = urlencode($_GET['addr']);
  	$url = "https://openapi.naver.com/v1/map/geocode?query=".$encText;

  	$is_post = false;
  	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
  	curl_setopt($ch, CURLOPT_POST, $is_post);
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$headers = array();
  	$headers[] = "X-Naver-Client-Id: ".$client_id;
  	$headers[] = "X-Naver-Client-Secret: ".$client_secret;

	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//  	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

	$response = curl_exec ($ch);
  	$status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//  	echo "status code: ".$status_code."";

  	curl_close($ch);
//	echo $response;

	$result = json_decode($response, true);
//	print_r($result);

	$x =  $result[result][items][0][point][x];
	$y = $result[result][items][0][point][y];
*/
?>
	<img width="150px" height="50px"src="./logo.png"></img>
	<br/><br/>
	<div class="지도 표시" id="map" style="width:100%;height:400px;"></div>

	<script>
	var map = new naver.maps.Map('map', {
		center: new naver.maps.LatLng(<?php echo $_GET['y'];?>, <?php echo $_GET['x'];?>),
		zoom: 10
	});

	var marker = new naver.maps.Marker({
		position: new naver.maps.LatLng(<?php echo $_GET['y'];?>, <?php echo $_GET['x'];?>),
		map: map
	});
	</script>
</div>
<div class="content">
	<p>기관이름: <?php echo $_GET['name'];?></p>
	<p>기관주소: <?php echo $_GET['addr'];?></p>
	<p>전화번호: <?php echo $_GET['tel'];?></p>
</div>

<button onclick="javascript:history.back()">뒤로가기</button>
</body>
</html>
