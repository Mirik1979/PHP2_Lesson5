<?php		
	class registeruser {
		public function reguser($login, $pwd) {
			require('../config/init.php');			
			$hpwd = hash("sha256", $pwd);
			$resdb1 = $condb->query("SELECT * FROM users WHERE userlogin = '" . $login ."'");  
	        $result1 = $resdb1->FETCHALL(PDO::FETCH_ASSOC); 
	        if (count($result1)>0) {
	        	header("Location: registerform.php");         	
	        } else {
	        	$sql = "INSERT INTO users (userlogin, userpwd) VALUES (:login, :pwd)";
	        	$params = (array(':login'=>$login, ':pwd'=>$hpwd));
	        	$q = $condb->insert($sql, $params);				
	        	if ($q) {
	        		header("Location: index.php");
	        	}
	        }

		}	
	}	
	$ruser = new registeruser(); 
	$ruser->reguser($_POST["login"], $_POST["pwd"]);
?>

