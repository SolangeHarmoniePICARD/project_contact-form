<?php

    require_once('db_connect.php');

    $sql = 'SELECT * FROM `tbl_users`';
    $query = $db->prepare($sql);
    $query->execute();
    $users = $query->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($users);
    
?>
<?php include 'include_header.php';?>
    
    <form action="handler_contact-form.php" method="post">
        <label for="field-username">Nom : </label>
        <input type="text" name="data-username" id="field-username" placeholder="Votre nom">
        <label for="input-email">Email</label>
        <input type="text" name="data-email" id="input-email" placeholder="Votre e-mail">
        <label for="input-subject">Sujet</label> 
        <input type="text" name="data-subject" id="input-subject">
        <label for="input-message">Message</label> 
        <textarea name="data-message" id="input-message"></textarea>
        <input type="submit" value="Envoyez">
    </form>

    <p>
        <?php 
            if (!$users) {
                echo '<a href="view_user-registration.php"><button>S\'inscrire</button></a>';
            } else if(!isset($_SESSION['username'])){
                echo '<a href="view_user-login.php"><button>Se connecter</button></a>';
            } else {
                echo '<a href="view_contact-messages-list.php"><button>Afficher les messages</button></a>';
                echo '<a href="handler_user-logout.php"><button>Se déconnecter</button></a>';
            }
        ?>
    </p>


<?php include 'include_footer.php'; ?>