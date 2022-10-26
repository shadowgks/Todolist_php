<?php
    //INCLUDE DATABASE FILE
    include_once('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save'])){
        saveTask();
    }        
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
    

    function getTasks()
    {
        //CODE HERE
        //SQL SELECT
        echo "Fetch all tasks";
    }
    
    function saveTask()
    {
        //Get data from form
        $title = $_POST['title'];
        $type = $_POST['type'];
        $priority = $_POST['priority'];
        $status = $_POST['status'];
        $date = $_POST['date'];
        $description = $_POST['description'];

        

        //SQL INSERT
        $_SESSION['message'] = "Task has been added successfully !";
		header('location: index.php');
    }

    function updateTask()
    {
        //CODE HERE
        //SQL UPDATE
        $_SESSION['message'] = "Task has been updated successfully !";
		header('location: index.php');
    }

    function deleteTask()
    {
        //CODE HERE
        //SQL DELETE
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
    }

?>