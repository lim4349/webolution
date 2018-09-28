<!DOCTYPE>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="./Api.css">
</head>
<body>
<?php
  $key = "mL5xQ8wYroWD4EAKfbSfoa9coea5YnX0n8iCN9ph4PWpPTWzNWglQPiXYyAGW%2B9WqVy52swX0B7TlN8fqiXo8w%3D%3D";
  $Q0 = urlencode($_GET['area1']);
  $Q1 = urlencode($_GET['area2']);
  $url = "http://apis.data.go.kr/B552657/ErmctInsttInfoInqireService/getParmacyListInfoInqire?Q0=".$Q0."&Q1=".$Q1."&numOfRows=20&serviceKey=".$key;
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);


  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'GET');

  $response = curl_exec ($ch);

  curl_close($ch);

  $result = new SimpleXMLElement($response);

  $count = count($result->body->items->item)-1;
?>
<script>
  show_map=function(x, y, name, addr, tel ) {
    location.href="./map.php?x="+x+"&y="+y+"&name="+name+"&addr="+addr+"&tel="+tel;
  }
</script>
<img width="150px" height="50px"src="./logo.png"></img>
<div class="약국 이름 출력 20개">
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
          <td><button onclick="show_map('<?php echo $result->body->items->item[$count]->wgs84Lon;?>', '<?php echo $result->body->items->item[$count]->wgs84Lat;?>','<?php echo $result->body->items->item[$count]->dutyName;?>','<?php echo $result->body->items->item[$count]->dutyAddr;?>','<?php echo $result->body->items->item[$count]->dutyTel1;?>')">상세지도</button></td>
        </tr>
  <?php
        $count--;
  }
  ?>
</table>
<button onclick="javascript:history.back()">뒤로가기</button>
</div>
</body>
</html>
