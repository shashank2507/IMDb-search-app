<?php
	$id=$_POST['id'];
	#$id="Leonardo dicaprio             ";
	echo $id;
	$tok = strtok($id, " \n\t");
	$new_id="";
	while ($tok !== false) {
		$new_id.=$tok;
		$new_id.="+";
		$tok = strtok(" \n\t");
	}
	#echo $new_id;
	$final_id="";
	$final_id.="https://www.imdb.com/find?q=".$new_id."&s=nm";
	echo $final_id;
	$myfile = fopen("c:\google\input.txt", "w") or die("Unable to open file!");
	fwrite($myfile, $final_id);
	fclose($myfile);
	
	#echo  exec("cd\\google && scrapy crawl dmoz -o it.json");
	exec("rm c:/google/it.json");
	echo exec("curl http://localhost:6800/schedule.json -d project=tutorial -d spider=dmoz -d setting=FEED_URI=file:///c:/google/it.json");
	sleep(15);
	header('Location: displayMovies.php');
	
	

?>
