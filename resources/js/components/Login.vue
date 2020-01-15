<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <!-- <b-alert v-model="email">{{}}</b-alert> -->
            <b-form class="justify-content-start">
              <b-form-group
                class="text-justify"
                id="input-group-1"
                label="Email:"
                label-for="email"
                for="email"
              >
                <b-input
                  id="email"
                  v-model="email"
                  class="mb-2 mr-sm-2 mb-sm-0"
                  placeholder="mail@joumail.nl"
                  name="email"
                ></b-input>
              </b-form-group>

              <b-form-group
                class="text-justify"
                for="password"
                id="input-group-1"
                label="Wachtwoord:"
                label-for="password"
              >
                <b-input
                  id="password"
                  v-model="password"
                  class="mb-2 mr-sm-2 mb-sm-0"
                  type="password"
                  placeholder="Wachtwoord"
                ></b-input>
              </b-form-group>

              <b-form-checkbox
                v-model="remember_me"
                for="remember_me"
                class="mb-2 mr-sm-2 mb-sm-0"
              >Remember me</b-form-checkbox>

              <b-button to="register" variant="primary">Regristreer</b-button>
              <b-button v-on:click="get_data" variant="primary">Save</b-button>
            </b-form>
          </div>
        </div>
      </div>
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
        .post("/auth/login", {
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
          this.$forceUpdate(); // Notice we have to use a $ here

          //   this.$router.push("profile");
        })
        .catch(response => {
          console.log("Couldn't create or get token");
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

      this.$router.push("profile");
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
