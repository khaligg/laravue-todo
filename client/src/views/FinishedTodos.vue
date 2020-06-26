<template>
    <div>
        <TodoList/>
    </div>
</template>

<script>
    import TodoList from '@/components/TodoList'

    export default {
        name: "FinishedTodos",
        components : {
            TodoList
        }
    }
</script>

<style scoped>

</style>