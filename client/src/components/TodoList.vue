<template>
    <div id="todo-list" class="container">
        <div class="row">
            <div class="col-sm-12">
            <transition name="fade" appear>
                <div class="card"  v-if="editingMode">
                    <div class="card-body">
                <form @submit.prevent="editTodo">
                    <div class="form-group row">
                        <label for="inputEditTodoTitle" class="col-sm-4 col-form-label">İşin adı</label>
                        <div class="col-sm-8">
                            <input v-model="todo.title" type="text" class="form-control" id="inputEditTodoTitle">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEditTodoDesc" class="col-sm-4 col-form-label">Kısaca hakkında</label>
                        <div class="col-sm-8">
                            <input v-model="todo.desc" type="text" class="form-control" id="inputEditTodoDesc">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEditTodoTag" class="col-sm-4 col-form-label">Tag</label>
                        <div class="col-sm-8">
                            <input v-model="todo.tag" type="text" class="form-control" id="inputEditTodoTag">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mx-auto">
                            <button type="submit" class="btn btn-success btn-block">Güncelle</button>
                        </div>
                    </div>
                </form>
                    </div>
                </div>
</transition>

                <div class="list disable-text-selection">
                    <transition-group name="fade">
                        <div class="card d-flex flex-row mb-3" v-for="task in isDoneFilter" v-bind:key="task.id">
                            <div class="d-flex flex-grow-1 min-width-zero">
                                <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">

                                        <span class="align-middle d-inline-block">{{ task.title }}</span>

                                    <p class="mb-0 text-muted text-small w-15 w-xs-100">{{ task.desc }}</p>
                                    <div class="w-15 w-xs-100">
                                        <span class="badge badge-pill badge-secondary">{{ task.tag }}</span>
                                    </div>
                                </div>
                                <label class="custom-control custom-checkbox mb-0 align-self-center mr-4 mb-1">
                                    <input type="checkbox" id="checkbox" v-model="task.done" @click="toggleDone(task.id, task.done)">
                                </label>
                                <label class="custom-control custom-checkbox mb-0 align-self-center mr-4 mb-1" v-if="task.done">
                                    <button class="btn btn-sm btn-danger" @click="deleteTodo(task.id)" >sil</button>
                                </label>
                                <label class="custom-control custom-checkbox mb-0 align-self-center mr-4 mb-1" v-else>
                                    <button class="btn btn-sm btn-primary" @click="editTask(task.id)">edit</button>
                                </label>
                            </div>

                        </div>
                    </transition-group>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import {eventBus} from '../main';

    export default {
        name: 'TodoList',
        data () {
            return {
                todo: {
                    id: '',
                    title: '',
                    desc: '',
                    tag: '',
                    done: ''
                },
                todos: [],
                isDone: '0',
                editingMode: false
            }
        },
        methods: {
            getTodos() {
                axios.get('todo')
                    .then(response => {
                        let data = response.data;
                        for(let key in data) {
                            this.todos.push({...data[key], id: key})
                        }
                        this.todos = response.data
                    })
                    .catch(e => console.log(e));
            },
            deleteTodo(id) {
                axios.delete(`todo/${id}`)
                    .then(() => {
                        this.getTodos()
                    })
                    .catch(e => console.log(e));
            },
            toggleDone(id,done) {
                axios.patch(`todo/${id}`, {
                    done: !done
                }).then(() => {
                    this.getTodos()
                })
                    .catch(e => console.log(e));
            },
            editTask(taskID) {
                this.editingMode = true;
                axios.get(`todo/${taskID}`)
                    .then(response => {
                        this.todo.id = response.data.id,
                        this.todo.title = response.data.title,
                        this.todo.desc = response.data.desc,
                        this.todo.tag = response.data.tag
                    })
                    .catch(e => console.log(e));
            },
            editTodo() {
                let taskID = this.todo.id;

                axios.patch(`todo/${taskID}`, {
                    title: this.todo.title,
                    desc: this.todo.desc,
                    tag: this.todo.tag
                }).then(() => {
                    this.getTodos();
                    this.editingMode = false;
                }).catch(e => console.log(e));
            }
        },
        computed: {
            currentRouteName() {
                return this.$route.name;
            },
            isDoneFilter() {
                let routeName = this.$route.name;

                if (routeName == 'finished') {
                    return this.todos.filter(c => c.done == 1)
                } else if (routeName == 'todo') {
                    return this.todos.filter(c => c.done == 0)
                } else {
                    return this.getTodos();
                }
            }
        },
        created() {
            this.getTodos();

            eventBus.$on('refreshTodos', () => {
                this.getTodos();
            });
        }
    }
</script>