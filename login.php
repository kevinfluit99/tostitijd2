<?php
require_once "include/include.php";

if(isset($_POST['but_submit'])){

    $uname = ($_POST['txt_uname']);//txt_uname is de username uit de form
    $password = ($_POST['txt_pwd']);//txt_pwd is het wachtwoord uit de form

	// hier wordt gekeken of je wel iets ingevoerd hebt.
    if ($uname != "" && $password != ""){

        $con = getDbConnection();

        $stmt = $con->prepare("SELECT * FROM bedrijf WHERE bedrijf_email=?  ");
        $stmt->execute([$uname]);

        if( $user = $stmt->fetch() ) {
            if(password_verify($password, $user['bedrijf_wachtwoord'])){
                session_start();
                $_SESSION['email'] = $user['bedrijf_email'];
        				$_SESSION['uid'] = $user['bedrijf_id'];
        				$_SESSION['admin'] = $user['bedrijf_admin'];
               header('Location: index.php');
            } else {
                echo 'Invalid password.';
                echo ' '.$user['bedrijf_wachtwoord'].'';
            }
        } else{
            echo "Invalid username and password";
        }

    }

}
?>
	<div class='background'>
		<div class='col-md-4' id='login'>
			<hr class='hr'>
			<div class='thumbmail'>
				<div class='caption font'>
					<form method="post" action="">
						<div id="div_login">
							<h1>Login</h1>
							<div>
								<input class='form__field' type="text" name="txt_uname" placeholder="Username" />
							</div>
							<br>
							<div>
								<input class='form__field' type="password" name="txt_pwd" placeholder="Password"/>
							</div>
							<br>
							<div>
								<input  class= "btn but_col" type="submit" value="Submit" name="but_submit"  />
							</div>
							<div class="btn btn-danger">
							  <a  class='font' href="../index.php">Cancel</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
