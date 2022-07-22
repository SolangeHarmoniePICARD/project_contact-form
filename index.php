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
        <p>
            <label for="field-username">Nom : </label> <br>
            <input type="text" name="data-username" id="field-username" placeholder="Votre nom">
        </p>
        <p>
            <label for="input-email">Email :</label> <br>
            <input type="text" name="data-email" id="input-email" placeholder="Votre e-mail">
        </p>
        <p>
            <label for="input-subject">Objet :</label> <br>
            <input type="text" name="data-subject" id="input-subject" placeholder="Objet de votre message">
        </p>
        <p>
            <label for="input-message">Message :</label> <br>
            <textarea name="data-message" id="input-message"></textarea>
        </p>
        <p>
            <img src="include_captcha-generator.php" alt="captcha"> <br>
            <label for="input-captcha">Captcha :</label>  <br>
            <input type="text" id="input-captcha" name="data-captcha" maxlength="5" autocomplete="off" required> &nbsp; 
        </p>
        <p>
            <input type="submit" value="Envoyer">
        </p>
    </form>

    <p>
        <?php 
            if (!$users) {
                echo '<p><a href="view_user-registration.php"><button>S\'inscrire</button></a></p>';
            } else if(!isset($_SESSION['username'])){
                echo '<a href="view_user-login.php"><button>Se connecter</button></a></p>';
            } else {
                echo '<p><a href="view_contact-messages-list.php"><button>Afficher les messages</button></a><a href="handler_user-logout.php"><button>Se déconnecter</button></a></p>';
            }
        ?>
    </p>


<?php include 'include_footer.php'; ?>