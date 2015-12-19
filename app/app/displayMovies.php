<?php
include_once 'header.php';
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/pure/0.4.2/pure-min.css">
	<link rel="stylesheet" href="./pure-layout-side-menu/css/layouts/side-menu.css">
	<script src="js/ui.js"></script>
	<style>
	img {
		width: 182px;
		height: 268px;
	}
	table {
		margin-top: 10px;
	}
	</style>
</head>
<body>
	<div id="layout">
		<a href="#menu" id="menuLink" class="menu-link">
			<span></span>
		</a>
		<div id="menu">
			<div class="pure-menu pure-menu-open">
				

				<ul>
					<li><a href="./dashboard.php">Home</a></li>
					<li class="menu-item-divided pure-menu-selected"><a href="#">Movies</a></li>
					<li><a href="./logout.php">Logout</a></li>
				</ul>
			</div>
		</div>
		<div class="content">
			<table class="pure-table pure-table-horizontal">
				<thead>
					<tr>
						<!-- <th>Id</th> -->
						<th>Movie display pic</th>
						<th align:'center'>Name (along with year,runtime etc.)</th>
						<th align:'center'>Rating</th>
						<th align:'center'>Top Reviews</th>
					</tr>
				</thead>

				<tbody>

					<?php
					/*$query = 'select * from movie';
					$result = mysqli_query($con,$query);
					$ct=0;*/
					#$str = file_get_contents('C:\google\it.json');
					$lines  = @file("C:\google\it.json");
					$str="[";
					$cou=count($lines);
					#echo $cou;
					for($i=0;$i<$cou;$i++){
						#echo $line;
						$str.=$lines[$i];
						if($i!=2)
						$str.=",";	
					}
					
					#$str="[".$str;
					#mb_substr($str, 0, -1);
					$str.="]";
					#echo $str;
				
					$data = json_decode($str, true); 
					$i=0;
					#echo print_r($json, true);
					$cou=count($data);
					#echo $cou;
					for($i=0;$i<$cou;$i++){
						//get the employee details
						$rating = $data[$i]['rating'][0];
						#echo $rating;
						$user = $data[$i]['user'][0];
						#echo $user;
						/*$link = $data[$i]['link'][0];
						echo $link;
						$url = $data[$i]['url'][0];
						echo $url;*/
						$image_link = $data[$i]['image_link'][0];
						#echo $image_link;
						$name = $data[$i]['name'][0];
						#echo $name;
						#echo "<br><br><br>";
						$subset="";
						$che=count($data[$i]['data']);
						for($j=0;$j<$che;$j++){
							$subset.=$data[$i]['data'][$j];
							$subset.="  |  ";
						}
						#echo $subset;
						/*$dat = [0];
						$review = scrapy.Field()*/
						#echo "<br><br><br>";
						$review_title1 = $data[$i]['review_title1'][0];
						$review_author1 = $data[$i]['review_author1'][0];
						$review_author_place1 = $data[$i]['review_author_place1'][0];
						$review_data1 = $data[$i]['review_data1'][0];
						#echo $review_data1;
						$review_title2 = $data[$i]['review_title2'][0];
						$review_author2 = $data[$i]['review_author2'][0];
						$review_author_place2 = $data[$i]['review_author_place2'][0];
						$review_data2 = $data[$i]['review_data2'][0];
						$review_title3 = $data[$i]['review_title3'][0];
						$review_author3 = $data[$i]['review_author3'][0];
						$review_author_place3 = $data[$i]['review_author_place3'][0];
						$review_data3 = $data[$i]['review_data3'][0];
						$movie_link=$data[$i]['movie_link'];
						#echo $movie_link;
						if ($i%2 ==0) {
							# code...
							echo '<tr class="pure-table-odd">';
						
							echo '<td><img src="'.$image_link.'" />';
							echo '<td><h3><a href="'.$movie_link.'" target="_blank">'.$name.'</a></h3>'.'<br>'.$subset.'</td>';
							echo '<td>'.$rating.' from<br>'.$user.' users</td>';
							echo '<td><b><h3>1. '.$review_title1.'</h3></b><h4> (by '.$review_author1.' '.$review_author_place1.'):</h4><h5> '.$review_data1.'</h5><br>
							<b><h3>2. '.$review_title2.'</h3></b><h4> (by '.$review_author2.' '.$review_author_place2.'):</h4><h5> '.$review_data2.'</h5><br>
							<b><h3>3. '.$review_title3.'</h3></b><h4> (by '.$review_author3.' '.$review_author_place3.'):</h4><h5> '.$review_data3.'</h5><br></td>';
							echo '</tr>';
						}
						else{
							echo '<tr>';
						
							echo '<td><img src="'.$image_link.'" />';
							echo '<td><h3><a href="'.$movie_link.'" target="_blank">'.$name.'</a></h3>'.'<br>'.$subset.'</td>';
							echo '<td>'.$rating.' from<br>'.$user.' users</td>';
							echo '<td><b><h3>1. '.$review_title1.'</h3></b><h4> (by '.$review_author1.' '.$review_author_place1.'):</h4><h5> '.$review_data1.'</h5><br>
							<b><h3>2. '.$review_title2.'</h3></b><h4> (by '.$review_author2.' '.$review_author_place2.'):</h4><h5> '.$review_data2.'</h5><br>
							<b><h3>3.'.$review_title3.'</h3></b><h4> (by '.$review_author3.' '.$review_author_place3.'):</h4><h5> '.$review_data3.'</h5><br></td>';
							echo '</tr>';	
						}
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
<!--  -->