//Dec Form
const form = document.forms['formTask'];

//Dec fun btn add task
function btnAddTasks(){
    //Show and hide btn 
    document.getElementById("task_delete_btn").style.display = "none";
    document.getElementById("task_update_btn").style.display = "none";
    document.getElementById("task_save_btn").style.display = "block";

    //Reset inputs Form
    form.reset();
} 

//Dec fun btn taks
function showModalTask(id){
    //Show and hide btn 
    document.getElementById("task_delete_btn").style.display = "block";
    document.getElementById("task_update_btn").style.display = "block";
    document.getElementById("task_save_btn").style.display = "none";
    
    //Fill in form Task
    form.task_id.value = id;
    form.task_title.value = document.getElementById(id).getAttribute('title');
    form.task_type.value = document.getElementById(id).getAttribute('type');
    form.task_priority.value = document.getElementById(id).getAttribute('priorite');
    form.task_status.value = document.getElementById(id).getAttribute('statue');
    form.task_datetime.value = document.getElementById(id).getAttribute('datetime');
    form.task_description.value = document.getElementById(id).getAttribute('description');
}


form.addEventListener('submit',(e)=>{
    if(form.task_priority.value.toLowerCase() =="please select"){
        e.preventDefault();
        console.log("priority is required");
        form.task_priority.style="border:2px Solid red";
    }else{
        form.task_priority.style="border:2px Solid green";
        console.log("success")
    }

})

// const validate = new window.JustValidate('#form-task');
// validate
//   .addField('#task-title', [
//     {
//       rule: 'minLength',
//       value: 3,
//     },
//     {
//       rule: 'required',
//     },
//     {
//       rule: 'maxLength',
//       value: 120,
//     },
//   ])

  