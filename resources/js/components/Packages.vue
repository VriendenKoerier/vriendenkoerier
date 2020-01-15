<template>
  <div class="container">
    <div class="justify-content-start col-md-6 d-md-inline-block">
      <b-input-group placeholder="Zoeken" name="search" class="mt-3">
        <b-form-input @keyup.enter.native="searchPackage" v-model="search"></b-form-input>
        <b-input-group-append>
          <b-button variant="primary" v-on:click="searchPackage">Zoeken</b-button>
        </b-input-group-append>
        <div>{{errors}}</div>
      </b-input-group>
    </div>
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
                margin-left: 10px;
                border: none;
                box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 8px 0px, rgba(0, 0, 0, 0.1) 0px 6px 20px 0px;"
            class="mb-2"
          >
            <b-card-text>{{packet.description}}</b-card-text>

            <b-button v-b-modal="'package-detail-form'+packet.id" variant="primary">Neem mee</b-button>
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
                <b-button
                  size="sm"
                  variant="primary"
                  v-b-modal="'package-detail-form'+packet.id"
                >Neem mee!</b-button>
              </template>
            </b-modal>
            <b-modal
              v-bind:title="'Ik wil '+packet.title+' brengen!'"
              :header-bg-variant="modal.headerBgVariant"
              :header-text-variant="modal.headerTextVariant"
              :body-bg-variant="modal.bodyBgVariant"
              :body-text-variant="modal.bodyTextVariant"
              :footer-bg-variant="modal.footerBgVariant"
              :footer-text-variant="modal.footerTextVariant"
              v-bind:id="'package-detail-form'+packet.id"
              centered
            >
              <b-form-group
                class="text-justify"
                label="Waarom wil je het pakket meenemen?"
                label-for="Message"
                for="formData"
              >
                <b-textarea
                  type="text"
                  placeholder="Bericht"
                  class="form-control"
                  v-model="formData.message"
                ></b-textarea>
              </b-form-group>
              <template v-slot:modal-footer>
                <b-button
                  size="sm"
                  variant="outline-danger"
                  @click="$bvModal.hide('package-detail-form'+packet.id)"
                >Sluiten</b-button>
                <b-button v-on:click="takePackage(packet.id, packet.user_id)">Neem mee!</b-button>
              </template>
            </b-modal>
          </b-card>
        </div>
      </div>
    </div>
    <pagination></pagination>
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
      formData: {
        id: "",
        user_id: "",
        message: ""
      },
      token_string: ""
    };
  },
  methods: {
    takePackage: function(pId, pUId) {
      if (this.loggedIn()) {

        var config = {
          headers: {
            Authorization: `Bearer ${this.token_string}`
            // 'Content-Type': 'multipart/form-data',
            // 'Content-Type': 'application/x-www-form-urlencoded',
            // 'X-Requested-With': 'XMLHttpRequest'
          }
        };

        // var packageForm = new FormData();

        // // append string
        // packageForm.append("id", pId);
        // packageForm.append("message", this.formData.message);
        // packageForm.append("user_id", pUId);

        var data = {
            "id": pId,
            "message": this.formData.message,
            "user_id": pUId,
        };

        axios
          .patch("/package/invite", data , config)
          .then(response => {
            console.log(response);
          })
          .catch(error => {
            console.log(error);
          });
      } else {
        this.$router.push("login");
      }
    },
    loggedIn: function() {
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
        return true;
      } else {
        this.$router.push("login");
        //doorroute naar login
        console.log("niet ingelogd");
        return false;
      }
    },
    searchPackage: function() {
      if (this.search) {
        console.log(this.search);
        axios
          .get(
            `https://api.vriendenkoerier.nl/api/packages/15/?search=${this.search}`
          )
          .then(response => {
            // JSON responses are automatically parsed.
            this.packagesSend = response.data.data;
          })
          .catch(e => {
            this.errors.push(e);
          });
      } else {
        axios
          .get(`https://api.vriendenkoerier.nl/api/packages/15`)
          .then(response => {
            // JSON responses are automatically parsed.
            this.packagesSend = response.data.data;
          })
          .catch(e => {
            this.errors.push(e);
          });
      }
    }
  },
  created() {
    axios
      .get(`https://api.vriendenkoerier.nl/api/packages/30`)
      .then(response => {
        // JSON responses are automatically parsed.
        this.packagesSend = response.data.data;
      })
      .catch(e => {
        // this.errors.push(e);
      });
    //   mounted() {
    //     axios
    //       .get("https://api.vriendenkoerier.nl/api/packages")
    //       .then(response => (this.info = response));
    //   }
  }
};
</script>


