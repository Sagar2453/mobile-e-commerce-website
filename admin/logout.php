<?php
                session_start();
                unset($_SESSION['log']);
                session_destroy();
                 header( "Location: http://localhost/mobile/admin/index.php" ); 
                 exit;
?>