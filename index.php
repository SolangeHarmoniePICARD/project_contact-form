<?php include 'include_header.php'; ?>
    
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

    <div>
        <a href="view.php"><button>Afficher les messages</button></a>
    </div>

    <p>

<?php include 'include_footer.php'; ?>