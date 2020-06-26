<template>
    <div>
        <div class="card">
            <div class="card-body">
        <form @submit.prevent="addNewTodo">
            <div class="form-group row">
                <label for="inputTodoTitle" class="col-sm-4 col-form-label">İşin adı</label>
                <div class="col-sm-8">
                    <input v-model="todo.title" type="text" class="form-control" id="inputTodoTitle">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputTodoDesc" class="col-sm-4 col-form-label">Kısaca hakkında</label>
                <div class="col-sm-8">
                    <input v-model="todo.desc" type="text" class="form-control" id="inputTodoDesc">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputTodoTag" class="col-sm-4 col-form-label">Tag</label>
                <div class="col-sm-8">
                    <input v-model="todo.tag" type="text" class="form-control" id="inputTodoTag">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mx-auto">
                    <button type="submit" class="btn btn-primary btn-block">Yeni İş Ekle</button>
                </div>
            </div>
        </form>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    import {eventBus} from '../main';

    export default {
        name: "AddTodo",
        data(){
            return {
                todo: {
                    title: '',
                    desc: '',
                    tag: '',
                }
            }
        },
        methods: {
            addNewTodo() {
                axios.post('todo', {
                    title: this.todo.title,
                    desc: this.todo.desc,
                    tag: this.todo.tag
                }).then(() => {
                    eventBus.$emit('refreshTodos'),
                        this.todo.title = '',
                        this.todo.desc = '',
                        this.todo.tag = ''
                }).catch(e => console.log(e));
            }
        }
    }
</script>

<style>
    .card {
        margin-bottom: 20px;
    }
    .form-group:last-child{
        margin-bottom: 0;
    }
</style>