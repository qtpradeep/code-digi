<?php
    session_start();
    if(isset($_SESSION['userid'])){
        unset($_SESSION['userid']);
        unset($_SESSION['name']);
        
        ?>
        
        <script>
            window.location.href="login.php";
        </script>
        <?php
        
    }

?>