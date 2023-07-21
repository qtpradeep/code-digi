<?php
    session_start();
    if(isset($_SESSION['adminid'])){
        unset($_SESSION['adminid']);
        unset($_SESSION['adminname']);
        
        ?>
        
        <script>
            window.location.href="login.php";
        </script>
        <?php
        
    }

?>