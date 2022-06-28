<?php include 'include_header.php'; ?>

    <form action="handler_user-registration.php" method="post">

        <div>
            <label for="input-username">Nom d'utilisateur:</label>
            <input type="text" id="input-username" name="data-username">
        </div>

        <div>
            <label for="input-email">Email:</label>
            <input type="email" id="input-email" name="data-email">
        </div>

        <div>
            <label for="input-password">Mot de passe:</label>
            <input type="password" id="input-password" name="data-password">
        </div>

        <div>
            <label for="input-pswdConfirmation">Confirmez le mot de passe :</label>
            <input type="password"  id="input-pswdConfirmation" name="data-pswdConfirmation">
        </div>

        <div>
            <label for="input-captcha">Captcha :</label>
            <input type="text" id="input-captcha" name="data-captcha" maxlength="5" autocomplete="off" required> &nbsp; <img src="include_captcha-generator.php" alt="captcha">
        </div>

        <div>
            <input type="submit" id="form_submit" value="S'inscrire">
        </div>

    </form>
    <p>
        <a href="index.php">
            <button>Retour</button>
        </a>
    </p>

<?php include 'include_footer.php'; ?>