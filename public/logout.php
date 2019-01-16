<?
	unset($_COOKIE["name"]);
	unset($_COOKIE["hash"]);
	setcookie("name",'',time()-3600);
	setcookie("hash",'',time()-3600);
	header("Location: index.php");  
?>