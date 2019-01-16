<?
	require('../config/init.php');
	
	$registered = false;
	if (isset($_COOKIE['name']) and isset($_COOKIE['hash'])) {
		$registered = true; 
	}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="styles/site.css" rel="stylesheet">
    <title>Онлайн магазин</title>
</head>
<body>
	<header>
		<div class="container">
			<div class="header">
			</div>
			<!--сделано выравнивание по флекс технологии 15.02.2018 -->
			<!--убрана горизонтальная прокрутка 16.02.2018 -->
			<ul class="menu">
			<!--домашнее задание третьего урока -->
			<?php
				if ($registered == true) {
					$reglink = '<li><a href="logout.php">Выйти</a></li>';
				} else {
					$reglink = '<li><a href="login.php">Войти</a></li>';
				}

				$menu = [
					'main' => '<li>Главная</li>', 
					'Login' => $reglink,  
					'Reg' => '<li><a href="registerform.php">Регистрация</a></li>',   
					'Catalogue' => '<li><a href="catalogue.php">Каталог</a></li>',   
					'Contacts' => '<li><a href="contacts.html">Контакты</a></li>' 
				];
				foreach($menu as $key => $item)
				{
					echo "$item";				
				}	
			?>
			</ul>		 
		</div>
	</header>
		<div class="center">
			<h1>Интернет-магазин по продаже книг</h1>
			<p>Добро пожаловать в наш Интернет-магазин, где вы найдете широкий выбор книг!</p>
			<?php				
				require_once '../lib/twig/Autoloader.php';
				Twig_Autoloader::register();
				$loader = new Twig_loader_FileSystem('templates');
				$twig = new Twig_Environment($loader);
				$template = $twig->LoadTemplate('pic.html');	        		
        		$resdb = $condb->query('SELECT * FROM pictures');  
        		$result = $resdb->FETCHALL(PDO::FETCH_ASSOC);   
        		foreach( $result  as  $arry )
				{
				   $fileOriginal = $arry["path"] . $arry["name"];            			
                		echo $template->render(array(
							'path'=> $fileOriginal,							
						));     
				}   	       		
			?>			
		</div>	
	</div>	
	<footer>
	<div class="footer"> 	
			<!--добавлены пиктограммы соцсетей 15.02.2018 -->
			<!--пиктограмма по всему сайту прижата к низу окна браузера 16.02.2018 -->
			<div class="social">
				<a href="#"></a>
				<a href="#"></a>
				<a href="#"></a>
				<a href="#"></a>			
			</div>	
			<div class="footer_text"><span>Все права защищены</span>
			<!--домашнее задание второго урока -->
			<?php
			$current_year = date ( 'Y' );
			echo "© SiteName.ru 2017-".$current_year; 
			?>
			</div>
		</div>		
</footer>
</body>
</html>