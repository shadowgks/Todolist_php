<?php
    //INCLUDE DATABASE FILE
    include_once('database.php');

    function saveTask()
    {
        global $conn;
    
        //Get data from form
        $title       = $_POST['task_title'];
        $type        = $_POST['task_type'];
        $priority    = $_POST['task_priority'];
        $status      = $_POST['task_status'];
        $date        = $_POST['task_datetime'];
        $description = $_POST['task_description'];
        
        //cmd sql
        $add_data = "INSERT INTO tasks(title, type_id, priority_id, status_id, task_datetime, description)
        VALUES('$title','$type','$priority','$status','$date','$description')";

        //Execute sql query
        if(mysqli_query($conn,$add_data)){
            $_SESSION['Seccess'] = "Task has been added successfully !";
            header('location: index.php');
        }else{
            $_SESSION['Faild'] = "Something went wrong of Add Task!";
            header('location: index.php');
        }    
    }