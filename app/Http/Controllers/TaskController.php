<?php

namespace App\Http\Controllers;

use App\Helper\ApiResponce;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Interfaces\TaskRepoitoriesInterface;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class TaskController extends Controller
{
    protected $taskRepository;

    public function __construct(TaskRepoitoriesInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index()
    {
        try{
            $tasks = $this->taskRepository->all();
            return ApiResponce::success(TaskResource::collection($tasks));
        }catch(Exception $e)
        {
            return ApiResponce::error($e->getMessage());
        }
    }

    public function show($id)
    {
        try{
            $task = $this->taskRepository->show($id);
            return ApiResponce::success(new TaskResource($task));
            
        }catch(Exception $e)
        {
            return ApiResponce::error($e->getMessage());
        }
    }

    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        try{
           $task = $this->taskRepository->create($data);
           return ApiResponce::success(new TaskResource($task));
        }catch(Exception $e)
        {
            return ApiResponce::error($e->getMessage());
        }
    }


    public function update(TaskRequest $request, $id)
    {
        $data = $request->validated();
        try{
           $task = $this->taskRepository->update($data,$id);
           return ApiResponce::success(new TaskResource($task));
        }catch(Exception $e)
        {
            return ApiResponce::error($e->getMessage());
        }   
    }

    public function delete($id)
    {
        try{
            $tasks = $this->taskRepository->all();
            return ApiResponce::success();
        }catch(Exception $e)
        {
            return ApiResponce::error($e->getMessage());
        }
    }
}
