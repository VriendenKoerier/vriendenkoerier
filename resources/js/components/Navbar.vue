<template>
  <div>
    <b-navbar toggleable="lg" type="dark" variant="primary">
      <b-navbar-brand to="/">Vrienden Koerier</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav variant="light">
          <b-nav-item to="/">Home</b-nav-item>
          <b-nav-item to="myPackages" v-show="loggedIn == true">Mijn Pakketten</b-nav-item>
          <b-nav-item v-show="loggedIn == true" to="create">Nieuw Pakket</b-nav-item>
        </b-navbar-nav>
        <b-navbar-nav class="ml-auto">
          <!-- <b-nav-form>
            <b-form-input size="sm" class="mr-sm-2" placeholder="Search"></b-form-input>
            <b-button
              size="sm"
              class="my-2 my-sm-0"
              name="search"
              v-model="search"
              type="submit"
            >Search</b-button>
          </b-nav-form>-->
          <!-- <template v-if="loggedIn == true"> -->
          <b-nav-item-dropdown right v-show="loggedIn == true">
            <template v-slot:button-content>
              <em>{{user.name}}</em>
            </template>
            <b-dropdown-item to="profile">Profiel</b-dropdown-item>
            <b-dropdown-item v-on:click="logout()">Uitloggen</b-dropdown-item>
          </b-nav-item-dropdown>
          <!-- </template> -->
          <!-- <template > -->
          <b-nav-item-dropdown right v-show="loggedIn == false">
            <template v-slot:button-content>
              <em>Login</em>
            </template>
            <b-dropdown-item to="login">Login</b-dropdown-item>
            <b-dropdown-item to="register">Registreren</b-dropdown-item>
          </b-nav-item-dropdown>
          <!-- </template> -->
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: {
        id: "",
        name: "",
        email: ""
      },
      token_string: "",
      loggedIn: false
    };
  },
  methods: {
    get_users_data: function() {
      axios
        .get("https://api.vriendenkoerier.nl/api/auth/user", {
          headers: {
            Authorization: "Bearer " + this.token_string
          }
        })
        .then(response => {
          console.log("werlt 2");
          this.user = response["data"];
          console.log(this.user);

          this.loggedIn = true;
        })
        .catch(response => {
          console.log("werktniet 2");
          this.loggedIn = false;

          //console.log(response.response.data);
        });
    },
    logout: function() {
      axios
        .get("https://api.vriendenkoerier.nl/api/auth/logout", {
          headers: {
            Authorization: "Bearer " + this.token_string
          }
        })
        .then(response => {
          this.loggedIn = false;
          document.cookie =
            "token=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

          this.$router.push("/");

          //return this.user;
        })
        .catch(response => {
          //add error if not logout
        });
    }
  },
  mounted() {
    //Gekke en geile coockie token ophalen en splitten - by timon ;)))))))))
    var token;
    var value = "; " + document.cookie;
    var parts = value.split("; " + "token" + "=");
    if (parts.length == 2) {
      token = parts
        .pop()
        .split(";")
        .shift();

      console.log(token);
      this.token_string = token;
      this.get_users_data();
    } else {
      this.$router.push("login");
      this.loggedIn = false;
      //doorroute naar login
      console.log("niet ingelogd");
    }
  }
};
</script>

