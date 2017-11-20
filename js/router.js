Tasks.Router.map(function() {
  this.resource('tasks', { path: '/' });
});

// Return all existing tasks
Tasks.TasksRoute = Ember.Route.extend({
  model: function() {
    return this.store.find('task');
  }
});