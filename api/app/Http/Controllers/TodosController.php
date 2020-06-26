<?php

namespace App\Http\Controllers;

use App\Repositories\TodoRepositoryInterface;
use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{

    protected $repository;

    public function __construct(TodoRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function store(Request $request)
    {
        return $this->repository->store($request);
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function update(Request $request, Todo $todo)
    {
        return $this->repository->update($request, $todo);
    }

    public function destroy(Todo $todo)
    {
        return $this->repository->destroy($todo);
    }
}
