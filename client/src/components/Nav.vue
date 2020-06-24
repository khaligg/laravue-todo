<template>
    <div>
        <ul>
            <li>
                <router-link :to="{
                    name: 'home'
                }">
                    Home
                </router-link>
            </li>
            <template v-if="authenticated">
                <li>
                    <router-link :to="{
                    name: 'dashboard'
                }" >
                        Dashboard
                    </router-link>
                </li>
                <li>
                    <a href="#" @click.prevent="signOut()">Signout</a>
                </li>
                <li>
                    {{ user.name }}
                </li>
            </template>
            <template v-else>
                <li>
                    <router-link :to="{
                    name: 'signin'
                }" >
                        SignIn
                    </router-link>
                </li>
            </template>
        </ul>
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

<style scoped>

</style>