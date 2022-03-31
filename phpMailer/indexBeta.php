<!DOCTYPE html>
<html>
<head>
    <title>Send an Email</title>
</head>
<body>
	<div>
		<h4 class="sent-notification"></h4>

		<form action="sendEmail.php" method="POST" id="myForm">
			<h2>Send an Email</h2>

            <select name="clients[]" id="clients" multiple>
                <?php
				session_start();
				$_SESSION['email'] = $_POST['inputClient'];
				$_SESSION['name'] = $_POST['nameClient'];
				//$clientEmail = [];
				//$clientName = [];
				//$clientEmail = $_POST['inputClient'];
					//$clientName = $_POST['nameClient'];
				if(isset($_POST['addClient']))
				{
					var_dump($_POST['inputClient']);
				var_dump($_POST['nameClient']);
					
					/*$clientEmail.array_push($_POST['inputClient']);
					array_push($_POST['nameClient']);
					
					foreach($clientEmail as $email){
					
					};*/
					echo("<option value=".$_SESSION['email'].">".$_SESSION['name']."</option>");
					unset($_SESSION['email']);
					unset($_SESSION['name']);

					
				}
				?>
            </select>
			<br><br>

			

			<label>Subject</label>
			<input name="subject" type="text" placeholder=" Enter Subject">
			<br><br>

			<p>Message</p>
			<textarea name="body" rows="5" placeholder="Wpisz wiadomosc" required></textarea>
			<br><br>

			<input type="submit" name="submit" value="Wyslij e-maila">
			</form>

			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" id="addClientForm">
			<input type="email" name="inputClient" placeholder="Wpisz adres email klienta" required>
			<input type="text" name="nameClient" placeholder="Wpisz nazwe klienta" required>
			<input type="submit" name="addClient" value="Dodaj Klienta">
			</form>
		
	</div>
</body>
</html>