<template>
  <div class="row justify-content-center">
    <div v-for="packet in packagesSend" v-bind:key="packet.id">
      <div>
        <b-card
          v-bind:title="packet.title"
          v-bind:img-src="'https://api.vriendenkoerier.nl/images/'+packet.photo"
          img-alt="Image"
          fluid
          img-top
          tag="article"
          style="max-width: 20rem;
                margin-top: 10px;
                margin-bottom: 10px;
                margin-right: 10px;
                margin-left: 10px;"
          class="mb-2"
        >
          <b-card-text>{{packet.description}}</b-card-text>

          <b-button v-on:click="deletePackage(packet.id)" variant="danger">Verwijderen</b-button>
          <b-button v-b-modal="'package-detail'+packet.id" variant="primary">Info</b-button>
          <b-modal
            v-bind:title="packet.title"
            :header-bg-variant="modal.headerBgVariant"
            :header-text-variant="modal.headerTextVariant"
            :body-bg-variant="modal.bodyBgVariant"
            :body-text-variant="modal.bodyTextVariant"
            :footer-bg-variant="modal.footerBgVariant"
            :footer-text-variant="modal.footerTextVariant"
            v-bind:id="'package-detail'+packet.id"
            size="lg"
            centered
          >
            <b-jumbotron bg-variant="white" text-variant="primary">
              <template v-slot:header>{{packet.title}}</template>

              <template v-slot:lead>{{packet.description}}</template>

              <hr class="my-4" />
            </b-jumbotron>
            <b-container>
              <b-row>
                <b-col>
                  <div>
                    <b-img
                      v-bind:src="'https://api.vriendenkoerier.nl/images/'+packet.photo"
                      fluid
                      alt="Responsive image"
                    ></b-img>
                  </div>
                </b-col>
                <b-col>
                  <b-table-simple hover small caption-top stacked>
                    <caption>Vind hier wat handige informatie over het pakket!</caption>
                    <colgroup>
                      <col />
                      <col />
                    </colgroup>
                    <colgroup>
                      <col />
                      <col />
                      <col />
                    </colgroup>
                    <colgroup>
                      <col />
                      <col />
                    </colgroup>
                    <b-thead head-variant="primary">
                      <b-tr>
                        <b-th>Hoogte</b-th>
                        <b-th>Breedte</b-th>
                        <b-th>Lengte</b-th>
                        <b-th>Gewicht</b-th>
                      </b-tr>
                    </b-thead>
                    <b-tbody>
                      <b-tr>
                        <b-th class="text-center">Pakket informatie:</b-th>
                        <b-td stacked-heading="Hoogte:">{{packet.height}}</b-td>
                        <b-td stacked-heading="Breedte:">{{packet.width}}</b-td>
                        <b-td stacked-heading="Lengte:">{{packet.length}}</b-td>
                        <b-td stacked-heading="Gewicht:">{{packet.weight}}</b-td>
                      </b-tr>
                    </b-tbody>
                  </b-table-simple>
                  <b-list-group>
                    <b-list-group-item>
                      <strong>Postcode verzender:</strong>
                      {{packet.postcode_a}}
                    </b-list-group-item>
                    <b-list-group-item>
                      <strong>Postcode ontvanger:</strong>
                      {{packet.postcode_b}}
                    </b-list-group-item>
                    <b-list-group-item>
                      <strong>Contact gegevens:</strong>
                      {{packet.contact}}
                    </b-list-group-item>
                  </b-list-group>
                </b-col>
              </b-row>
            </b-container>
            <template v-slot:modal-footer>
              <b-button
                size="sm"
                variant="outline-danger"
                @click="$bvModal.hide('package-detail'+packet.id)"
              >Sluiten</b-button>
            </template>
          </b-modal>
        </b-card>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      packagesSend: [],
      packet: {
        id: "",
        title: "",
        description: "",
        height: "",
        width: "",
        length: "",
        weight: "",
        photo: "",
        contact: "",
        postcode_a: "",
        postcode_b: "",
        adres_a: "",
        adres_b: ""
      },
      packet_id: "",
      edit: false,
      search: "",
      errors: "",
      error: "",
      modal: {
        headerBgVariant: "secondary",
        headerTextVariant: "black",
        bodyBgVariant: "white",
        bodyTextVariant: "black",
        footerBgVariant: "white",
        footerTextVariant: "dark"
      },
      token_string: ""
    };
  },
  methods: {
    deletePackage: function(e) {
      var config = {
        headers: {
          Authorization: `Bearer ${this.token_string}`
          // 'Content-Type': 'multipart/form-data',
          // 'Content-Type': 'application/x-www-form-urlencoded',
          // 'X-Requested-With': 'XMLHttpRequest'
        }
      };
      console.log(e);
      axios
        .delete(`https://api.vriendenkoerier.nl/api/package/${e}`, config)
        .then(response => {
          this.$router.push("/");
          // JSON responses are automatically parsed.
          console.log(response);
        })
        .catch(e => {
          // this.errors.push(e);
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
    } else {
      this.$router.push("login");
      this.loggedIn = false;
      //doorroute naar login
      console.log("niet ingelogd");
    }
    var config = {
      headers: {
        Authorization: `Bearer ${this.token_string}`
        // 'Content-Type': 'multipart/form-data',
        // 'Content-Type': 'application/x-www-form-urlencoded',
        // 'X-Requested-With': 'XMLHttpRequest'
      }
    };
    axios
      .get(`https://api.vriendenkoerier.nl/api/packages/user/15`, config)
      .then(response => {
        // JSON responses are automatically parsed.
        this.packagesSend = response.data.data;
      })
      .catch(e => {
        // this.errors.push(e);
      });
  }
};
</script>

<style>
</style>
