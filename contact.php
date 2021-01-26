<?php

include('exe/bdd.php');
	if (isset($_POST['mail']) != "" && isset($_POST['name']) != "" && isset($_POST['tel']) != "" && isset($_POST['message']) != ""){
			$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
			if (preg_match($regex, $_POST['mail'])){
					$sql = "INSERT INTO Messages (nom,mail,tel,message) VALUES (?, ?, ?, ?)";
					$q = $pdo->prepare($sql);
					$q->execute(array($_POST['name'], $_POST['mail'], $_POST['tel'], $_POST['message']));
					echo "<h3 class='txtgood'>Merci pour votre message, il est en cours d'acheminement vers ma boite mail !</h3>";
					$text = $_POST['message'] . "\r\n" . "De : " . $_POST['name'] . "\r\n" . "Email : " . $_POST['mail'] . "\r\n" . "N° de tel : " . $_POST['tel'];
					$from = 'From: Portfolio' . "\r\n";
					$header = 'X-MSMail-Priority: High ' . '\r\n' .
     				'X-Mailer: PHP/' . phpversion();
					mail('mmidor2021@gmail.com', 'Contact depuis le site', $text ,$from);
			}
			else{
				header("Location: index.php?error=mail");
			}
	}
	else{
		header("Location: index.php?error=champ");
    }
    
    ?>