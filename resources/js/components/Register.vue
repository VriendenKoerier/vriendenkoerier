<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <!-- <b-alert v-model="email">{{}}</b-alert> -->
            <b-form>
              <b-form-group
                class="text-justify"
                id="input-group-1"
                label="Naam:"
                label-for="name"
                for="name"
              >
                <b-input id="name" v-model="name" class="mb-2 mr-sm-2 mb-sm-0" placeholder="Name"></b-input>
              </b-form-group>

              <b-form-group
                class="text-justify"
                id="input-group-2"
                label="Email:"
                label-for="email"
                for="email"
              >
                <b-input
                  id="email"
                  v-model="email"
                  class="mb-2 mr-sm-2 mb-sm-0"
                  placeholder="Email"
                ></b-input>
              </b-form-group>

              <b-form-group
                class="text-justify"
                id="input-group-3"
                label="Wachtwoord:"
                label-for="password"
                for="password"
              >
                <b-input
                  id="password"
                  v-model="password"
                  class="mb-2 mr-sm-2 mb-sm-0"
                  type="password"
                  placeholder="Password"
                ></b-input>
              </b-form-group>

              <b-form-group
                class="text-justify"
                id="input-group-4"
                label="Wachtwoord bevestigen:"
                label-for="password_confirmation"
                for="password_confirmation"
              >
                <b-input
                  id="password_confirmation"
                  v-model="password_confirmation"
                  class="mb-2 mr-sm-2 mb-sm-0"
                  type="password"
                  placeholder="Confirm password"
                ></b-input>
              </b-form-group>

              <b-button to="login" variant="primary">login</b-button>
              <b-button v-on:click="handleSubmit" variant="primary">Save</b-button>
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
      name: "",
      email: "",
      password: "",
      password_confirmation: ""
    };
  },
  methods: {
    handleSubmit(e) {
      e.preventDefault();
      if (
        this.password === this.password_confirmation &&
        this.password.length > 0
      ) {
        axios
          .post("https://api.vriendenkoerier.nl/api/auth/signup", {
            name: this.name,
            email: this.email,
            password: this.password,
            password_confirmation: this.password_confirmation
          })
          .then(result => {
            // console.log(result);
            // this.access_token = response["data"]["access_token"];
            // this.$cookie.set("token", this.access_token, 7);
            //   localStorage.setToken("acces_token", "fgrrwgwtgrggrrtg");
            // console.log(localStorage.getItem("acces_token"));
            this.$router.push("login");
          })
          .catch(err => {
            console.error(err);
          });
      }
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
