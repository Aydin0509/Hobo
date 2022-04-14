<?php
require_once 'partials/header.php';
require_once 'backend/class/User.php';


$user = new User();

if(isset($_POST['register'])){
    echo $user->create($_POST);
}
if(isset($_POST['login'])){
	echo $user->login($_POST);
}

?>

<body>
		<div class="login-wrap">
	<div class="login-html">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Inloggen</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Aanmelden</label>
		<form method="post" class="login-form">
			<div class="sign-in-htm">
				<div class="group">
					<label for="email" class="label">Email</label>
					<input id="email" type="text" class="input" name="email" required>
				</div>
				<div class="group">
					<label for="password" class="label">Wachtwoord</label>
					<input id="pass" type="password" class="input" name="password" required>
				</div>
				<div class="group">
					<input type="submit" class="button" name="login" value="Inloggen">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<a href="#forgot">Wachtwoord vergeten?</a>
				</div>
                <div class="foot-lnk">
					<label for="tab-2">Nog geen lid?</a>
				</div>
			</div>
			<div class="sign-up-htm">
				<div class="group">
					<label for="email" class="label">Email</label>
					<input id="email" type="text" name="email" required class="input">
				</div>
				<div class="group">
					<label for="password" class="label">Wachtwoord</label>
					<input id="password" type="password" name="password" required class="input">
				</div>
				<div class="group">
					<label for="password" class="label">Herhaal wachtwoord</label>
					<input id="password" type="password" name="conf-password" required class="input">
				</div>
				<div class="group">
					<label for="AboID" class="label">Kies abonnement</label>
					<select name="option" id="AboID" class="input">
                        <option value="1">Hobo Basis</option>
                        <option value="2">Hobo Extra</option>
                        <option value="3">Hobo Platinum</option>
                    </select>
				</div>
				<div class="group">
					<input type="submit" class="button" name="register" value="Meld je aan">
				</div>
				<div class="hr"></div>
				<div class="foot-lnk">
					<label for="tab-1">Al lid?</a>
				</div>
			</div>
		</div>
</form>
	</div>
</div>
</body>