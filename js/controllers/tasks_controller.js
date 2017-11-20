Tasks.TasksController = Ember.ArrayController.extend({
  actions: {

    // Create task
    createTask: function() {
      // Get the task description set by the "New Task" text field
      var description = this.get('newDescription').trim();
      if (!description) { return; }

      // Create the new Task model
      var task = this.store.createRecord('task', {
        description: description,
        is_completed: false
      });

      // Hide "New Task" text field
      this.toggleProperty('isShowingNewTask');

      // Clear the "New Task" text field
      this.set('newDescription', '');

      this.isEditing = false;

      // Save the new model
      task.save();
    },

    // Toggle "New Task" text field
    toggleNewTask(){
      this.toggleProperty('isShowingNewTask');
    }
  },


  // Remaining task count
  remaining: function() {
    return this.filterBy('is_completed', false).get('length');
  }.property('@each.is_completed'),

  // Completed task count
    completed: function() {
    return this.filterBy('is_completed', true).get('length');
  }.property('@each.is_completed'),

  // All task count
    all: function() {
    return this.get('length');
  }.property('@each.is_completed')
});