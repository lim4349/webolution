<?php

	$file = fopen("./data.txt", "w") or die("fail");
	fwrite($file, $_GET['symptom']);
	fclose($file);
	
	$command = escapeshellcmd('python3 test.py');
	$output = shell_exec($command);
	echo $output;	

//	unlink("./data.txt");		
?>
