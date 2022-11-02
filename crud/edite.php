<?php
    //INCLUDE DATABASE FILE
    include_once('database.php');

    function updateTask()
    {
        global $conn;
        
        //Get data form
        $id          = $_POST['task_id'];
        $title       = $_POST['task_title'];
        $type        = $_POST['task_type'];
        $priority    = $_POST['task_priority'];
        $status      = $_POST['task_status'];
        $date        = $_POST['task_datetime'];
        $description = $_POST['task_description'];

        //SQL UPDATE
        $update_data = "UPDATE `tasks` 
        SET title='$title',type_id='$type',priority_id='$priority',status_id='$status',task_datetime='$date',description='$description' 
        WHERE id = $id";

        //Execute sql query
        if(mysqli_query($conn,$update_data)){
            $_SESSION['Seccess'] = "Task has been updated successfully !";
            header('location: index.php');
        }else{
            $_SESSION['Faild'] = "Something went wrong of update Task!";
            header('location: index.php');
        }
    }