<template>
  <div>
    <b-card no-body class="overflow-hidden" style="max-width: 800px row justify-content-center;">
      <b-row no-gutters>
        <b-col md="6">
          <b-card-img src="https://picsum.photos/400/400/?image=20" class="rounded-0"></b-card-img>
        </b-col>
        <b-col md="6">
          <b-card-body title="Profiel">
            <b-card-text>
              <ul>
                <li>Naam:</li>
                <li>{{user.name}}</li>
                <li>Email:</li>
                <li>{{user.email}}</li>
              </ul>
            </b-card-text>
          </b-card-body>
        </b-col>
      </b-row>
    </b-card>
    <packagesperuser></packagesperuser>
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
        .get("/auth/user", {
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
    //Gekke coockie token ophalen en splitten - by timon ;)))))))))
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
