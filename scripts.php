<?php
    //INCLUDE DATABASE FILE
    include_once('database.php');
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

    function querySelect($S_C){
        global $conn;

        //SQL SELECT
        $requete = "SELECT tasks.*
        ,priorities.name AS 'NamePriorities'
        ,types.name AS 'NameTypes'
        ,statuses.name AS 'NameStatuses' 
        FROM tasks join types join priorities join statuses
        on types.id=tasks.type_id
        and priorities.id=tasks.priority_id
        and statuses.id=tasks.status_id
        where tasks.status_id = $S_C";

        //Execute sql query and return query
        return mysqli_query($conn,$requete);
    }

    function getTasks($status)
    {
        //Dec function querySelect
        $data = querySelect($status);

        //Check icons status
        if($status == 1){
            $icons = 'fa-circle-question';
        }
        else if ($status == 2){
            $icons = 'fa-rotate-right';
        }
        else if ($status == 3){
            $icons = 'fa-circle-check';
        }

        while($row = $data->fetch_assoc()) {
        echo '<button 
        class="bg-light d-flex align-items-center border-0 w-100 mb-2 py-3 px-0 bg-white mb-1" 
        href="#modal-task" data-bs-toggle="modal"
        onclick="showModalTask('.$row['id'].')"
        id="'.$row['id'].'"
        title="'.$row['title'].'"
        type="'.$row['type_id'].'"
        priorite="'.$row['priority_id'].'"
        statue="'.$row['status_id'].'"
        datetime="'.$row['task_datetime'].'"
        description="'.$row['description'].'">
            <div class="fs-4 text-success">
                <i class="fa-solid '.$icons.' px-3"></i>
            </div>
            <div class="text-start">
                <div style="display:none" class="id">'.$row['id'].'</div>
                <div style="display:none" class="status">'.$row['NameStatuses'].'</div>
                <div class="fw-bolder fs-5 title">'.$row['title'].'</div>
                <div class="pb-1">
                    <div class="opacity-50">#'.$row['id'].' created in <span class="dateTime">'.$row['task_datetime'].'</span></div>
                    <div class="fw-bold description" title="'.$row['description'].'">'.$row['description'].'</div>
                </div>
                <div>
                    <span class="badge bg-primary prioritie">'.$row['NamePriorities'].'</span>
                    <span class="badge bg-secondary type">'.$row['NameTypes'].'</span>
                </div>
            </div>
        </button>';
        }
    }

    function numberofrow($count){
        //Dec function querySelect
        echo mysqli_num_rows(querySelect($count));
    }
    
    function saveTask()
    {
        global $conn;
    
        //Get data from form
        $title = $_POST['task_title'];
        $type = $_POST['task_type'];
        $priority = $_POST['task_priority'];
        $status = $_POST['task_status'];
        $date = $_POST['task_datetime'];
        $description = $_POST['task_description'];
        
        //cmd sql
        $add_data = "INSERT INTO tasks(title, type_id, priority_id, status_id, task_datetime, description)
        VALUES('$title','$type','$priority','$status','$date','$description')";

        //Execute sql query
        if(mysqli_query($conn,$add_data)){
            $_SESSION['Seccess'] = "Task has been added successfully !";
            header('location: index.php');
        }else{
            $_SESSION['Faild'] = "Something Went Wrong.!!!";
            header('location: index.php');
        }
            
    }

    function updateTask()
    {
        global $conn;

        //Get data form
        $id = $_POST["task_id"];
        $title = $_POST['task_title'];
        $type = $_POST['task_type'];
        $priority = $_POST['task_priority'];
        $status = $_POST['task_status'];
        $date = $_POST['task_datetime'];
        $description = $_POST['task_description'];

        //SQL UPDATE
        $update_data = "UPDATE `tasks` 
        SET title='$title',type_id='$type',priority_id='$priority',status_id='$status',task_datetime='$date',description='$description' 
        WHERE id = '$id'";

        //Execute sql query
        if(mysqli_query($conn,$update_data)){
            $_SESSION['Seccess'] = "Task has been updated successfully !";
            header('location: index.php');
        }else{
            $_SESSION['Faild'] = "Something Went Wrong.!!!";
            header('location: index.php');
        }
    }


    function deleteTask()
    {
        global $conn;

        //Get id form
        $id = $_POST["task_id"];

        //SQL INSERT
        $delete_data = "DELETE FROM `tasks`
        WHERE id='$id'";

        //Execute sql query
        if(mysqli_query($conn,$delete_data)){
            $_SESSION['Seccess'] = "Task has been deleted successfully !";
            header('location: index.php');
        }else{
            $_SESSION['Faild'] = "Something Went Wrong.!!!";
            header('location: index.php');
        }
    }

?>