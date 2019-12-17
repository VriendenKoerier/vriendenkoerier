<template>
    <div>
        <table>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
            </tr>
            <tr>
                <td>{{ this.user_data.id }}</td>
                <td>{{ this.user_data.name }}</td>
                <td>{{ this.user_data.email }}</td>
            </tr>
        </table>
    </div>
</template>

<script>
// import Vue from "vue";
// import axios from "axios";
// Vue.use(axios);
export default {
    name: "app",
    data: function() {
        return {
            access_token: "",
            user_data: ""
        };
    },
    methods: {
        get_data: function() {
            axios
                .post("https://api.vriendenkoerier.nl/api/auth/login", {
                    client_id: 1,
                    client_secret: "HxqJqYFwf4FwiG4ZBX2lZXKcIWalywQ80oAuS831",
                    grant_type: "password",
                    email: "test123456789@gmail.com",
                    password: "geheim1234",
                    remember_me: 1,
                    scope: "*"
                })
                .then(response => {
                    this.access_token = response["data"]["access_token"];
                    this.get_users_data();
                })
                .catch(response => {
                    console.log(response.response.data);
                });
        },
        get_users_data: function() {
            axios
                .get("https://api.vriendenkoerier.nl/api/auth/user", {
                    headers: {
                        Authorization: "Bearer " + this.access_token
                    }
                })
                .then(response => {
                    console.log("werlt 2");
                    this.user_data = response["data"];
                    return this.user_data;
                })
                .catch(response => {
                    console.log("werktniet 2");
                    console.log(response.response.data);
                });
        }
    },
    mounted() {
        this.get_data();
    }
};
</script>

<style>
#app {
    font-family: "Avenir", Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    color: #2c3e50;
}
</style>
