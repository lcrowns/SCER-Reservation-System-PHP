<?php 
echo "<ul class=\"pagination\">";

if($page>1){
	echo "<li><a class='btn btn-sm' style='background-color:grey; color:white' href='{$page_url}' title='Go to the first page'>";
	echo "<<";
	echo "</a></li>&nbsp;";
}

$total_pages= ceil($total_rows/$records_per_page);
$range=1;

$initial_num=$page-$range;
$condition_limit_num=($page+$range)+1;

for($x=$initial_num; $x<$condition_limit_num; $x++){
	if(($x>0)&&($x<=$total_pages)){
		if($x==$page){
			echo "<li><a class='btn btn-sm active' style='background-color:grey; color:white' href=\"#\">$x<span class=\"sr-only\">(current)</span></a></li>&nbsp;";

		}else{
			echo "<li><a class='btn btn-sm' style='background-color:grey; color:white' href='{$page_url}page=$x'>$x</a></li>&nbsp;";
		}
	}
}

if($page<$total_pages){
	echo "&nbsp;<li><a class='btn btn-sm' style='background-color:grey; color:white' href='".$page_url. "page={$total_pages}' title='Last page is {$total_pages}'>";
	echo ">>";
	echo "</a></li>";
}
?>