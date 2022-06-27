<?php 

    include 'include_header.php';

    if($_GET['user-email']){
        $user_email = strip_tags($_GET['user-email']);
    } else {
        $_SESSION['message'] = 'Il y a un problème...';
        header('Location: view_user-login.php'); 
    }

?>

<form action="handler_pswd-update.php?user-email=<?=$user_email?>" method="post">
        <div>
            <label for="input-pswd">Nouveau mot de passe : </label>
            <input type="password" id="input-pswd" name="data-pswd" required>
        </div>
        <div>
            <input type="submit" value="Modifier">
        </div>
    </form>

<?php include 'include_footer.php'; ?>