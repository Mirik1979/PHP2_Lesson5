<?
	class logincheck {
		public function login($login, $pwd) {
			require('../config/init.php');			
			$hpwd = hash("sha256", $pwd);
			$resdb2 = $condb->query("SELECT * FROM users WHERE userlogin = '" . $login ."'");  
	        $result2 = $resdb2->FETCHALL(PDO::FETCH_ASSOC); 
	        if (count($result2)>0) {
	        	foreach ($result2 as $row) {
	        		if($row['userpwd'] == $hpwd) {
	        			setcookie("name", $login, time()+60*60*24*30);
                    	setcookie("hash", $hpwd, time()+60*60*24*30);  
	        			header("Location: index.php");  
	        		} else {	        			
	        			header("Location: login.php");	 
	        		}
	        	}	        	       	
	        } else {	        	
	        	header("Location: login.php");	        	
	        }

		}	
	}	
	$luser = new logincheck(); 
	$luser->login($_POST["login"], $_POST["pwd"]);
?>