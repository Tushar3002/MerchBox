<?php
session_start();
include('include/dbcon.php');
if(isset($_REQUEST["ad_login"]))
{
	$getuser=mysqli_query($con,"select * from admin where name='".$_REQUEST["unm"]."' AND password='".$_REQUEST["psw"]."'");
	$res=mysqli_fetch_row($getuser);
	$nores=mysqli_num_rows($getuser);
	if($nores>0)
	{
		$_SESSION["ses"]=$res[1];
		echo "<script>window.location='index.php';</script>";
	}	
	else
		echo "<script>window.location='signin.php';</script>";
}
else
	echo "<script>window.location='signin.php';</script>";
?>