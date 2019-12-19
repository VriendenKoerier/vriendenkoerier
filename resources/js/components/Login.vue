<template>
  <div>
    <div>
      <!-- <b-alert v-model="email">{{}}</b-alert> -->
      <b-form inline>
        <label class="sr-only" for="email">Email</label>
        <b-input id="email" v-model="email" class="mb-2 mr-sm-2 mb-sm-0" placeholder="Jane Doe"></b-input>

        <label class="sr-only" for="password">Password</label>
        <b-input
          id="password"
          v-model="password"
          class="mb-2 mr-sm-2 mb-sm-0"
          type="password"
          placeholder="Jane Doe"
        ></b-input>

        <b-form-checkbox
          v-model="remember_me"
          for="remember_me"
          class="mb-2 mr-sm-2 mb-sm-0"
        >Remember me</b-form-checkbox>

        <b-button v-on:click="get_data" variant="primary">Save</b-button>
      </b-form>
    </div>
  </div>
</template>

<script>
// var Vue = require("vue");
// import Vue from "vue";
// import axios from "axios";
// Vue.use(axios);
export default {
  name: "app",
  data() {
    return {
      access_token: "",
      user_data: "",
      email: "",
      password: "",
      remember_me: ""
    };
  },
  methods: {
    get_data: function() {
      axios
        .post("https://api.vriendenkoerier.nl/api/auth/login", {
          client_id: 1,
          client_secret: "HxqJqYFwf4FwiG4ZBX2lZXKcIWalywQ80oAuS831",
          grant_type: "password",
          email: this.email,
          password: this.password,
          remember_me: this.remember_me,
          scope: "*"
        })
        .then(response => {
          this.access_token = response["data"]["access_token"];
          this.$cookie.set("token", this.access_token, 7);
          //   localStorage.setToken("acces_token", "fgrrwgwtgrggrrtg");
          // console.log(localStorage.getItem("acces_token"));
          //router.push({ name: "profile" });
        })
        .catch(response => {
          console.log("KANKER KAPOT");
        });
    }
  },
  mounted() {
    //Gekke cookcie uit elkaar halen g
    var value = "; " + document.cookie;
    var parts = value.split("; " + "token" + "=");
    if (parts.length == 2) {
      console.log(
        parts
          .pop()
          .split(";")
          .shift()
      );
      //doorroute naar profile
    }
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
