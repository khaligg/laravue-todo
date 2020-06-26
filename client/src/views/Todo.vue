<template>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <AddNewTodo/>
        </div>
        <div class="col-md-6 mx-auto">
        <TodoList/>
        </div>
    </div>
</template>

<script>
    import TodoList from '@/components/TodoList'
    import AddNewTodo from '@/components/AddTodo'

    export default {
        name: 'todo',
        components: {
            TodoList,
            AddNewTodo
        }
    }
</script>