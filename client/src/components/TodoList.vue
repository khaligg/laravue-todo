<template>
    <div id="todo-list-example" class="container">

        <div class="row">
            <div class="col-sm-12">


                <div class="list disable-text-selection">
                    <div class="card d-flex flex-row mb-3" v-for="(todo) in todos" v-bind:key="todo.id">
                        <div class="d-flex flex-grow-1 min-width-zero">
                            <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                                <a class="list-item-heading mb-0 truncate w-40 w-xs-100 mt-0" href="#">
                                    <span class="align-middle d-inline-block">{{ todo.title }}</span>
                                </a>
                                <p class="mb-0 text-muted text-small w-15 w-xs-100">{{ todo.desc }}</p>
                                <div class="w-15 w-xs-100">
                                    <span class="badge badge-pill badge-secondary">{{ todo.tag }}</span>
                                </div>
                            </div>
                            <label class="custom-control custom-checkbox mb-0 align-self-center mr-4 mb-1">
                                <a href="#" @click="deleteTask(todo.id)">&times;</a>
                            </label>
                        </div>
                    </div>
                </div>


            </div>
        </div>



    </div>
</template>
<script>
    import axios from 'axios'
    export default {
        name: 'TodoList',
        data () {
            return {
                id: '',
                title: '',
                desc: '',
                tag: '',
                done: false,
                todos: []
            }
        },
        mounted() {
            this.getTodos()
        },
        methods: {
            getTodos() {
                axios({ method: 'GET', url: 'todo' }).then(
                    result => {
                        this.todos = result.data
                    },
                    error => {
                        console.error(error)
                    }
                );
            },
            deleteTask(id) {
                axios.delete(`todo/${id}`).then(() => {
                    this.getTodos();
                });
            }
        }
    }
</script>