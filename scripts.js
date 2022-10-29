//Dec Btn
// let task_delete_btn = document.getElementById("task_delete_btn");
// let task_update_btn = document.getElementById("task_update_btn");
// let task_save_btn = document.getElementById("task_save_btn");

// //Dec form Task
// const form = document.forms['formTask'];

// //Btn Add Task
// function addModalTask(){
//     task_delete_btn.style.display = 'none';
//     task_update_btn.style.display = 'none';
//     task_save_btn.style.display = 'block';
// }

// //Btn Task
// function showModalTask(){
//     task_delete_btn.style.display = 'block';
//     task_update_btn.style.display = 'block';
//     task_save_btn.style.display = 'none';

//     $btn = 
// }
$(document).ready(function(){
//Btn show modal tasks
$('.show-modal-task').click(function(){
    //Btn Model
    $('#task_delete_btn').show();
    $('#task_update_btn').show();
    $('#task_save_btn').hide();

    //Dec id input from form
    var task_id = $(this).closest('button').find('.id').text();
    var task_title = $(this).closest('button').find('.title').text();
    var task_type = $(this).closest('button').find('.type').text();
    var task_prioritie = $(this).closest('button').find('.prioritis').text();
    var task_status = $(this).closest('button').find('.status').text();
    var task_dateTime = $(this).closest('button').find('.dateTime').text();
    var task_description = $(this).closest('button').find('.description').text();
    
    //test
    console.log(task_id);

    //Remplier Inputs form
    $('#task-id').val(task_id);
    $('#task-title').val(task_title);
    $('#task-priority').val(task_prioritie);
    $('#task-status').val(task_status);
    // $('#task-date').val(task_dateTime);
    $('#task-description').val(task_description);
    
});
//Btn add Tasks
$('.add-modal-task').click(function(){
    $('#task_delete_btn').hide();
    $('#task_update_btn').hide();
    $('#task_save_btn').show();

    
});

});
