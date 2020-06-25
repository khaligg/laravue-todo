<template>
    <div>
        <AddNewTodo/>
        <TodoList/>
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