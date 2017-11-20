<?php

class TaskController extends \BaseController {

	/**
	 * Display a listing of the tasks.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Get all tasks
		$tasks = Task::all();
		return Response::json(array(
			'error' => false,
			'tasks' => $tasks->toArray()),
			200
		);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// Get task by id
        $task = Task::find($id);

        if(empty($task))
        {
        	return Response::json(array(
            'error' => true),
            410
       	 ); 
        }
        else
        {
	        return Response::json(array(
	            'error' => false,
	            'task' => $task->toArray()),
	            200
	        );  	
        }

	}


	/**
	 * Store a newly created task in storage.
	 *
	 * @return Response
	 */
	public function store()
	{	
		// Validate
        $rules = array(
            'task.description'      => 'required',
            'task.is_completed'      => 'required|boolean'
        );

        $validator = Validator::make(Input::all(), $rules);

        // Failed to validate
        if ($validator->fails())
        {	
            return Response::json(array(
            		'error' => true,
            		'message' => $validator->messages()),
            		400
            );
        }
        // Validation success
        else
        {	
            // Store
			$task = new Task;
			$data = Input::get('task');
			$task = $task->create($data);

			return Response::json(array(
					'error'   => false,
					'message' => 'created successfully',
					'task' => $task
				),
					201
			);
        }

	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// Validate
        $rules = array(
            'task.description'       => 'required',
            'task.is_completed'      => 'required|boolean'
        );

        $validator = Validator::make(Input::all(), $rules);

        // Failed to validate
        if ($validator->fails())
        {	
            return Response::json(array(
            		'error' => true,
            		'message' => $validator->messages()),
            		400
            );
        }
        // Validation success
        else
        {	
            // Update
			$data = Input::get('task');
			$task = Task::find($id);
			$task->update($data);

	        return Response::json(array(
	        'error' => false,
	    	'message' => 'updated successfully'),
	        200
	        );
        }
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// Delete task by id
        $task = Task::find($id);
        $task->delete();

        return Response::json(array(
        'error' => false,
    	'message' => 'deleted successfully'),
        200
        );
	}
}
