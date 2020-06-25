<template>
    <div>
        <div class="card">
            <div class="card-body">
        <form @submit.prevent="addNewTodo">
            <div class="form-group row">
                <label for="inputTodoTitle" class="col-sm-4 col-form-label">Title</label>
                <div class="col-sm-8">
                    <input v-model="todoTitle" type="text" class="form-control" id="inputTodoTitle">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputTodoDesc" class="col-sm-4 col-form-label">Description</label>
                <div class="col-sm-8">
                    <input v-model="todoDesc" type="text" class="form-control" id="inputTodoDesc">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputTodoTag" class="col-sm-4 col-form-label">Tag</label>
                <div class="col-sm-8">
                    <input v-model="todoTag" type="text" class="form-control" id="inputTodoTag">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mx-auto">
                    <button type="submit" class="btn btn-primary btn-block">Add New Todo</button>
                </div>
            </div>
        </form>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "AddTodo",
        data(){
            return {
                todoTitle: '',
                todoDesc: '',
                todoTag: '',
            }
        },
        methods: {
            addNewTodo() {
                axios.post('todo', {
                    title: this.todoTitle,
                    desc: this.todoDesc,
                    tag: this.todoTag
                })
            }
        }
    }
</script>

<style scoped>
    .card {
        margin-bottom: 20px;
    }
    .form-group:last-child{
        margin-bottom: 0;
    }
</style>