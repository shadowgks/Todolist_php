<?php
    //INCLUDE DATABASE FILE
    include_once('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();
    
    //ROUTING
    if(isset($_POST['save'])){
        saveTask($conn);
    }        
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
    

    function getTasks()
    {
        //CODE HERE
        //SQL SELECT
        echo "Fetch all tasks";
    }
    
    function saveTask($conn)
    {
        //Get data from form
        $title = $_POST['title'];
        $date = $_POST['date'];
        $description = $_POST['description'];
        
        //cmd sql
        $add_data = $conn->prepare("INSERT INTO tasks(titile, type_id, priority_id, status_id, task_datetime, description) 
                        VALUES('',1,1,1,'','')");
        $add_data->execute();
        

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