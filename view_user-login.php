<?php include 'include_header.php'; ?>

<?php

if (isset($_SESSION['username'])) {
    $_SESSION['message'] = 'Vous êtes déjà connecté !';
    header('Location: view_contact-messages-list.php'); 
} else {

    require_once('db_connect.php');

    $sql = 'SELECT * FROM `tbl_contacts`';
    $query = $db->prepare($sql);
    $query->execute();
    $contacts = $query->fetchAll(PDO::FETCH_ASSOC);
    
}

?>

    <form action="handler_user-login.php" method="post">
        <div>
            <label for="input-username">Nom d'utilisateur : </label>
            <input type="text" id="input-username" name="data-username">
        </div>
        <div>
            <label for="input-password">Mot de passe : </label>
            <input type="password" id="input-password" name="data-password">
        </div>
        <div>
            <input type="submit" value="Se connecter">
            <a href="test.php">Mot de passe oublié ?</a>
        </div>
       
    </form>
    
    <p>
        <a href="index.php">
            <button>Retour</button>
        </a>
    </p>

<?php include 'include_footer.php'; ?>