<?php
namespace App\Repositories;

use App\Todo;
use Illuminate\Http\Request;

class TodoRepository implements TodoRepositoryInterface
{

    public function index()
    {
        return Todo::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'desc' => 'string',
            'tag' => 'string',
            'done' => 'boolean',
        ]);
        $todo = Todo::create($data);
        return response($todo, 201);
    }

    public function update(Request $request, Todo $todo)
    {
        $data = $request->validate([
            'title' => 'string',
            'desc' => 'string',
            'tag' => 'string',
            'done' => 'boolean'
        ]);

        $todo->update($data);

        return response($todo, 200);
    }

    public function destroy(Todo $todo)
    {
        try {
            $todo->delete();

        } catch (\Exception $e) {
            console.log($e);
        }

        return response('Deleted', 200);
    }
}
