<?php

namespace App\Repositories;

use App\Todo;
use Illuminate\Http\Request;

interface TodoRepositoryInterface
{
    public function index();

    public function store(Request $request);

    public function update(Request $request, Todo $todo);

    public function destroy(Todo $todo);
}
