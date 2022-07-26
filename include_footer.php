    <p>
        <?php
            if($_SESSION['message']){
                echo $_SESSION['message'] ;
                $_SESSION['message'] = "";
            }
        ?>
    </p>

</body>
</html>