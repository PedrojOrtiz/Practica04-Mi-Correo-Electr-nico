<?php
    session_start();
    //if(isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
    //    header("location: ../public/vista/login.html");
    //}
    if(!isset($_SESSION['id'])){
		header("Location: ../public/vista/login.html");
	}
?>