<?php
$connect = mysqli_connect("localhost" , "root" , "Akshu@1234" , "coffeshop") or die("connection failed");
if($connect)
{
	echo "Connected";
}
else
{
	echo "Not Connected";
}
?>
