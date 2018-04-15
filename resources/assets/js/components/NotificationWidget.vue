<template>
    <div class="dropdown d-none d-md-flex" v-if="notifications.length">
        <a class="nav-link icon" data-toggle="dropdown">
            <i class="fe fe-bell"></i>
            <span class="nav-unread"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
            <a  v-for="notification in notifications" href="#" class="dropdown-item d-flex">
                <img class="avatar mr-3 align-self-center" v-bind:src="notification.data.from_user_gravatar" v-bind:alt="notification.data.from_user_name">
                <div>
                    <strong>{{ notification.data.from_user_name }}</strong> {{ notification.data.title }}
                    <div class="small text-muted">{{ notification.created_at }}</div>
                </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item text-center text-muted-dark" v-on:click="markNotificationsAsRead">Mark all as read</a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                notifications: [],
            }
        },

        mounted() {
            this.getNotifications();
        },

        methods: {
            getNotifications: function() {
                let self = this;

                axios.get('/api/users/' + this.$parent.currentUser.id + '/notifications', {
                    params: {
                        userId: this.$parent.currentUser.id
                    }
                })
                    .then(function (response) {
                        self.notifications = '';
                        self.notifications = response.data.data;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            markNotificationsAsRead: function() {
                let self = this;

                axios.delete('/api/users/' + this.$parent.currentUser.id + '/notifications/mark-as-read')
                    .then(function (response) {
                        this.getNotifications();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    }
</script>

<style scoped>

</style>