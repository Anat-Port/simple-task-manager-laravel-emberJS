<?php
 
class Task extends Eloquent {
 
    protected $table = 'tasks';

    public $timestamps = false;

    protected $fillable = array('description', 'is_completed');
}