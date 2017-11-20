window.Tasks = Ember.Application.create();

// Fixture adapter - comment in for testing
// Tasks.ApplicationAdapter = DS.FixtureAdapter.extend();

Tasks.ApplicationAdapter = DS.RESTAdapter.extend({
  namespace: 'simple-task-manager/server/public'
});

 