function showModalTask(id){
    //Dec Form
    const form = document.forms['formTask'];
    
    //fill in form Task
    form.task_id.value = id;
    form.task_title.value = document.getElementById(id).getAttribute('title');
    form.task_type.value = document.getElementById(id).getAttribute('type');
    form.task_priority.value = document.getElementById(id).getAttribute('priorite');
    form.task_status.value = document.getElementById(id).getAttribute('statue');
    // form.task_datetime.value = document.getElementById(id).getAttribute('datetime');
    form.task_description.value = document.getElementById(id).getAttribute('description');
}