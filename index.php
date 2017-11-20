<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Simple Task Manager</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

  <script type="text/x-handlebars" data-template-name="tasks">

    <section id="taskapp">

      <!-- new task -->
      <header id="header">
        {{#if isShowingNewTask}}
        <button class="minus" {{action "toggleNewTask"}}><span></span></button>
        {{else}}
        <button class="plus" {{action "toggleNewTask"}}><span></span></button> 
        {{/if}}
        משימות
      </header>
      <!-- end new task -->

      <!-- Tasks list -->
      <section id="main">
        <ul id="task-list">
            <li class="new"> 
            {{#if isShowingNewTask}}
             {{input
                      type="text"
                      id="new-task"
                      placeholder="הוסף תיאור משימה"
                      value=newDescription
                    action="createTask"}}
            {{/if}}
        </li>
          {{#each task in model itemController="task"}}  
          <li {{bind-attr class="task.isCompleted:completed task.isEditing:editing"}}>
            {{#if task.isEditing}}
            {{edit-task class="edit" value=task.description focus-out="acceptChanges"
            insert-newline="acceptChanges"}}
            {{else}}
              {{input type="checkbox" checked=task.isCompleted class="toggle"}}
              <span></span>
            <label {{action "editTask" on="doubleClick"}}> {{task.description}}</label>
            <button {{action "removeTask"}} class="destroy"></button>

            {{/if}}
          </li>
          {{/each}}
        </ul>

      </section>
      <!-- END Tasks list -->

      <footer id="footer">
       <span id="all-count">
        סה"כ: <strong>{{all}}</strong> 
      </span>  
      <span id="completed-count">
        הושלמו: <strong>{{completed}}</strong>
      </span>
      <span id="remaining-count">
       לסיום: <strong>{{remaining}}</strong> 
     </span>        
     
   </footer>
 </section>

</script>

<!-- ... Ember.js and other javascript dependencies ... -->
<script src="js/libs/jquery-1.11.2.min.js"></script>
<script src="js/libs/handlebars-v1.3.0.js"></script>
<script src="js/libs/ember.js"></script>
<script src="js/libs/ember-data.js"></script>

<script src="js/application.js"></script>
<script src="js/router.js"></script>

<script src="js/models/task.js"></script>

<script src="js/controllers/tasks_controller.js"></script>
<script src="js/controllers/task_controller.js"></script>

<script src="js/views/edit_task_view.js"></script>
</body>
</html>