<?php
    session_start();

    if(isset($_SESSION['usuario'])){
        $logged = true;
        $username = $_SESSION['usuario'];
        $name = $_SESSION['dni'];
        $admin = $_SESSION['rol'];
    }
	else{
		$logged = false;
	}

?>