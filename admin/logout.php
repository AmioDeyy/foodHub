<?php
    include('config/config.php');
    //Destro the session 
    session_destroy(); 

    header('location:'.SITEURL.'admin/index.php');

?>