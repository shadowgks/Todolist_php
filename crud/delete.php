<?php
    //INCLUDE DATABASE FILE
    include_once('database.php');

    function deleteTask()
    {
        global $conn;

        //Get id form
        $id = $_POST['task_id'];

        //SQL INSERT
        $delete_data = "DELETE FROM `tasks`
        WHERE id=$id";

        //Execute sql query
        if(mysqli_query($conn,$delete_data)){
            $_SESSION['Seccess'] = "Task has been deleted successfully !";
            header('location: index.php');
        }else{
            $_SESSION['Faild'] = "Something went wrong of deleted Task!";
            header('location: index.php');
        }
    }