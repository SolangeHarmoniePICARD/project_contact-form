<?php include 'include_header.php'; ?>

    <form action="handler_user-login.php" method="post">
        <div>
            <label for="input-username">Username: </label>
            <input type="text" id="input-username" name="data-username">
        </div>
        <div>
            <label for="input-password">Password: </label>
            <input type="password" id="input-password" name="data-password">
        </div>
        <div>
            <input type="submit" value="Se connecter">
        </div>
    </form>
    
    <p>
        <a href="index.php">
            <button>Retour</button>
        </a>
    </p>

<?php include 'include_footer.php'; ?>