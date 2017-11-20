Tasks.TaskController = Ember.ObjectController.extend({
  actions: {

  editTask: function() {
    this.set('isEditing', true);
  },
  
  acceptChanges: function() {
    this.set('isEditing', false);
    if (Ember.isEmpty(this.get('model.description')))
    {
      this.send('removeTask');
    }
    else
    {
      this.get('model').save();
    }
  },

  removeTask: function () {
    var task = this.get('model');
    task.deleteRecord();
    task.save();
  }
},

isEditing: false,

  // Handle completed task toggle
  isCompleted: function(key, value){
    var model = this.get('model');

    if (value === undefined)
    {
      // property being used as a getter
      return model.get('is_completed');
    }
    else
    {
      // property being used as a setter
      model.set('is_completed', value);
      model.save();
      return value;
    }
  }.property('model.is_completed')
});

