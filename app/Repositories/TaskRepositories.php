<?php 

namespace App\Repositories;

use App\Interfaces\TaskRepoitoriesInterface;
use App\Models\Task;
use Exception;

class TaskRepositories implements TaskRepoitoriesInterface
{
    protected $model ; 
    public function __construct(Task $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        $task = $this->model->latest()->simplePaginate(8);
        return $task;
    }


    public function show($id)
    {
        $task = $this->model->findOrFail($id);
        return $task;
    }

    public function create($data)
    {
        $task = $this->model->create($data);
        return $task;
    }

    public function update($data ,$id)
    {
        $task = $this->model->findOrFail($id);
        $task->update($data);
        return $task;
    }


    public function delete($id)
    {
        $this->model->findOrFail($id)->delete();
    }
}