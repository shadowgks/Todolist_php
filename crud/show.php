<?php
    //INCLUDE DATABASE FILE
    include_once('database.php');

function querySelect($S_C){
    global $conn;

    //SQL SELECT
    $requete = "SELECT tasks.*
    ,priorities.name AS 'NamePriorities'
    ,types.name AS 'NameTypes'
    ,statuses.name AS 'NameStatuses' 
    FROM tasks join types join priorities join statuses
    on types.id           = tasks.type_id
    and priorities.id     = tasks.priority_id
    and statuses.id       = tasks.status_id
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
    }else if ($status == 2){
        $icons = 'fa-rotate-right';
    }else if ($status == 3){
        $icons = 'fa-circle-check';
    }  
    foreach($data as $row){
    echo '<button 
    class="bg-light d-flex align-items-center border-0 w-100 mb-2 py-3 px-0 bg-white mb-1" 
    href="#modal-task" data-bs-toggle="modal"
    onclick="showModalTask('.$row['id'].')"
    id          ="'.$row['id'].'"
    title       ="'.$row['title'].'"
    type        ="'.$row['type_id'].'"
    priorite    ="'.$row['priority_id'].'"
    statue      ="'.$row['status_id'].'"
    datetime    ="'.$row['task_datetime'].'"
    description ="'.$row['description'].'">
        <div class="fs-4 text-success">
            <i class="fa-solid '.$icons.' px-3"></i>
        </div>
        <div class="text-start">
            <div style="display:none" class="status">'.$row['NameStatuses'].'</div>
            <div class="fw-bolder fs-5">'.$row['title'].'</div>
            <div class="pb-1">
                <div class="opacity-50">#'.$row['id'].' created in <span class="dateTime">'.$row['task_datetime'].'</span></div>
                <div class="fw-bold text-truncate" style="max-width:18rem" title="'.$row['description'].'">'.$row['description'].'</div>
            </div>
            <div>
                <span class="badge bg-primary">'.$row['NamePriorities'].'</span>
                <span class="badge bg-secondary">'.$row['NameTypes'].'</span>
            </div>
        </div>
    </button>';
    }
}

function countRowsTasks($count){
    //Dec function querySelect and count rows status
    echo mysqli_num_rows(querySelect($count));
}
