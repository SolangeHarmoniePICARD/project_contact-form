<?php include 'include_header.php'; ?>

<form action="handler_pswd-reset-link.php" method="post">
        <div>
            <label for="input-email">Votre email: </label>
            <input type="text" id="input-email" name="data-email" required>
        </div>
        <div>
            <input type="submit" id="form_submit" value="Soumettre">
        </div>
    </form>

    <div>
        <a href="view_user-login.php">
            <button>Retour</button>
        </a>
    </div>


<?php include 'include_footer.php'; ?>