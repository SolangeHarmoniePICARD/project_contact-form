<?php include 'include_header.php';?>
    
    <form action="handler.php" method="post">
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
        <a href="view_user-registration.php"><button>S'inscrire</button></a>
        <a href="view_user-login.php"><button>Se connecter</button></a>
    </p>

    <p>
        <a href="view_contact-messages-list.php"><button>Afficher les messages</button></a>
    </p>

<?php include 'include_footer.php'; ?>