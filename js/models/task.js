
// Create Todo class 
Tasks.Task = DS.Model.extend({
  description: DS.attr('string'),
  is_completed: DS.attr('boolean'),
});


// TODO: remove and replace with API
Tasks.Task.FIXTURES = [
  {
    id: 1,
    description: 'משימה א',
    is_completed: true
  },
  {
    id: 2,
    description: 'משימה ב',
    is_completed: false
  },
  {
    id: 3,
    description: 'משימה ג',
    is_completed: false
  }
];
