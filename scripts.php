<?php
    //INCLUDE DATABASE FILE
    include('database.php');
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
        include('database.php');
        //CODE HERE
        //SQL SELECT
        $requete = "SELECT * FROM tasks";
        $data = mysqli_query($conn,$requete);

        while($row = $data->fetch_assoc()) {
        echo '<button  class="bg-light d-flex align-items-center border-0 w-100 mb-2 py-3 px-0 bg-white mb-1" href="#modal-task" data-bs-toggle="modal">
            <div class="fs-4 text-success">
                <i class="fa-solid fa-circle-question px-3"></i>
            </div>
            <div class="text-start">
                <div class="fw-bolder fs-5">'.$row['titile'].'</div>
                <div class="pb-1">
                    <div class="opacity-50">#'.$row['id'].' created in '.$row['task_datetime'].'</div>
                    <div class="fw-bold" title="'.$row['description'].'">'.$row['description'].'</div>
                </div>
                <div class="">
                    <span class="badge bg-primary">High</span>
                    <span class="badge bg-secondary">Feature</span>
                </div>
            </div>
        </button>';
        }
        //test
        var_dump($row);
        //count
        // $count = mysqli_num_rows($data);
        // echo $count;
    }
    
    function saveTask($conn)
    {
        //Get data from form
        $title = $_POST['title'];
        $type = $_POST['task-type'];
        $priority = $_POST['priority'];
        $status = $_POST['status'];
        $date = $_POST['date'];
        $description = $_POST['description'];
        
        //cmd sql
        // $add_data = mysqli_query("INSERT INTO tasks(titile, type_id, priority_id, status_id, task_datetime, description) 
        // VALUES('',1,1,1,'','')");
        // $add_data->execute();
        

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