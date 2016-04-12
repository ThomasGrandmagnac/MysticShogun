<?php
session_start();
require_once("User.php");
$login = new User();

if($login->is_loggedin() != "")
{
	$login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);

	if($login->doLogin($uname,$umail,$upass))
	{
		$login->redirect('home.php');
	}
	else
	{
		$error = "Utilisateur non reconnu";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>Se connecter</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="css/style.css" type="text/css"  />
</head>
<body>

<div class="signin-form">

	<div class="container">

       <form class="form-signin" method="post" id="login-form">
        <h2 class="form-signin-heading">Se connecter</h2><hr />
        <div id="error">
        <?php
			if(isset($error))
			{
				?>
                <div class="alert alert-danger">
                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
                <?php
			}
		?>
        </div>

        <div class="form-group">
        <input type="text" class="form-control" name="txt_uname_email" placeholder="Identifiant" required />
        <span id="check-e"></span>
        </div>

        <div class="form-group">
        <input type="password" class="form-control" name="txt_password" placeholder="Mot de passe" />
        </div>

     	<hr/>

        <div class="form-group">
            <button type="submit" name="btn-login" class="btn btn-default">
                	<i class="glyphicon glyphicon-log-in"></i> &nbsp; Se connecter
            </button>
        </div>
      	<br/>
            <label>Nouvel utilisateur ? <a href="sign-up.php">S'inscrire !</a></label>
      </form>

    </div>

</div>

</body>
</html>