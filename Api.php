<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="./Api.css">
</head>
<body>

<?php

	$type = $_GET['type'];
	if($type=="내과") {
		$type="D001";
	}
	else if($type=="외과") {
		$type="D006";
	}
	else if($type=="치과") {
		$type="D026";
	}
	else if($type=="정형외과") {
		$type="D008";
	}
	else if($type=="신경과") {
		$type="D003";
	}
	else if($type=="성형외과") {
		$type="D010";
	}
	else if($type=="산부인과") {
		$type="D011";
	}
	else if($type=="이비인후과") {
		$type="D013";
	}
	else if($type=="안과") {
		$type="D012";
	}
	else if($type=="피부과") {
		$type="D005";
	}
	else if($type=="비뇨기과") {
		$type="D014";
	}
	$key = "mL5xQ8wYroWD4EAKfbSfoa9coea5YnX0n8iCN9ph4PWpPTWzNWglQPiXYyAGW%2B9WqVy52swX0B7TlN8fqiXo8w%3D%3D";
	$Q0 = urlencode($_GET['area1']);
	$Q1 = urlencode($_GET['area2']);
	$QD = urlencode($type);
	$url = "http://apis.data.go.kr/B552657/HsptlAsembySearchService/getHsptlMdcncListInfoInqire?Q0=".$Q0."&Q1=".$Q1."&QD=".$QD."&numOfRows=20&serviceKey=".$key;
  	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);
  	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');

	$response = curl_exec ($ch);

  	curl_close($ch);

	$result = new SimpleXMLElement($response);

//	print_r($result);

//	echo $result->body->items->item[0]->dutyAddr;
	$count = count($result->body->items->item)-1;
?>
	<script>
		show_map=function(x, y, name, addr, tel ) {
			location.href="./map.php?x="+x+"&y="+y+"&name="+name+"&addr="+addr+"&tel="+tel;
		}
	</script>
<img width="150px" height="50px"src="./logo.png"></img>
	<div class="hospital">
	<table class="demo-table">
		<tr>
			<td>주소</td>
			<td>이름</td>
			<td>지도</td>
		</tr>
		<?php while($count>=0) {
			?>	<tr>
						<td><?php echo $result->body->items->item[$count]->dutyAddr;?></td>
						<td><?php echo $result->body->items->item[$count]->dutyName;?></td>
						<td><button class="btn" onclick="show_map('<?php echo $result->body->items->item[$count]->wgs84Lon;?>', '<?php echo $result->body->items->item[$count]->wgs84Lat;?>','<?php echo $result->body->items->item[$count]->dutyName;?>','<?php echo $result->body->items->item[$count]->dutyAddr;?>','<?php echo $result->body->items->item[$count]->dutyTel1;?>')">상세지도</button></td>
					</tr>
		<?php
					$count--;
		}
		?>
	</table>

</div>
</body>
</html>
