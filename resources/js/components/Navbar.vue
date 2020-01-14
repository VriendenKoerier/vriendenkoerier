<template>
  <div>
    <b-navbar toggleable="lg" type="dark" variant="primary">
      <b-navbar-brand to="/">Vrienden Koerier</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-nav variant="light">
          <b-nav-item to="packages">Pakketten</b-nav-item>
          <b-nav-item to="create">Aanmaken</b-nav-item>
          <b-nav-item to="profile">Profiel</b-nav-item>
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

          <b-nav-item-dropdown right>
            <template v-slot:button-content>
              <em>User</em>
            </template>
            <b-dropdown-item href="#">Profiel</b-dropdown-item>
            <b-dropdown-item href="#">Uitloggen</b-dropdown-item>
          </b-nav-item-dropdown>
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
      token_string: ""
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
          //return this.user;
        })
        .catch(response => {
          console.log("werktniet 2");
          //console.log(response.response.data);
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
      //doorroute naar login
      console.log("niet ingelogd");
    }
  }
};
</script>

