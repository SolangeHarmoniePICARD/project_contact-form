    <p>
        <?php
            if($_SESSION){
                echo $_SESSION['message'] ;
                $_SESSION['message'] = "";
            }
        ?>
    </p>

</body>
</html>