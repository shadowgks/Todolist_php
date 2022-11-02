<?php
    //INCLUDE FILE
    include_once('database.php');
    include_once('crud/edite.php');
    include_once('crud/add.php');
    include_once('crud/show.php');
    include_once('crud/delete.php');
    
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();
    
    //ROUTING
    if(isset($_POST['save'])){
        saveTask();
    }        
    if(isset($_POST['update'])){
        updateTask();
    }      
    if(isset($_POST['delete'])){
        deleteTask();
    }      

?>

