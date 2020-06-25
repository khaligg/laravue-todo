<template>
    <div class="row">
        <div class="col-md-12 mx-auto">
            <nav class="nav nav-pills">
                <li class="nav-item">
                    <router-link class="nav-link" :to="{name: 'home'}">
                        Home
                    </router-link>
                </li>
                <template v-if="authenticated">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name: 'todo'}" >
                            Todo List
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" @click.prevent="signOut()">Signout</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link disabled" aria-disabled="true">{{ user.name }}</a>
                    </li>
                </template>
                <template v-else>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name: 'login'}" >
                            Login
                        </router-link>
                    </li>
                </template>
            </nav>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'

    export default {
        name: "Nav",
        computed: {
            ...mapGetters({
                authenticated: 'auth/authenticated',
                user: 'auth/user',
            })
        },
        methods: {
            ...mapActions({
                signOutAction: 'auth/signOut'
            }),

            signOut() {
                this.signOutAction().then(() => {
                    this.$router.replace({
                        name: 'home'
                    })
                })
            },
        }
    }
</script>