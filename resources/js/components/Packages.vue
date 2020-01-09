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
            img-src="https://picsum.photos/600/300/?image=25"
            img-alt="Image"
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

            <b-button to="#" variant="primary">Neem mee</b-button>
            <b-button to="#" variant="primary">Info</b-button>
          </b-card>
        </div>
        <!-- <ul>
          <li>{{packet.title}}</li>
          <li>{{packet.name}}</li>
          <li>{{packet.description}}</li>
          <li>{{packet.height}}</li>
          <li>{{packet.widht}}</li>
          <li>{{packet.lenght}}</li>
          <li>{{packet.weight}}</li>
          <li>{{packet.photo}}</li>
          <li>{{packet.email}}</li>
          <li>{{packet.phone_number}}</li>
          <li>{{packet.postcode_a}}</li>
          <li>{{packet.postcode_b}}</li>
        </ul>-->
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
        name: "",
        description: "",
        height: "",
        widht: "",
        lenght: "",
        weight: "",
        photo: "",
        email: "",
        phone_number: "",
        postcode_a: "",
        postcode_b: ""
      },
      packet_id: "",
      edit: false,
      search: "",
      errors: "",
      error: ""
    };
  },
  methods: {
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
  //   created() {
  //     this.fetchPackages();
  //   },
  //   methods: {
  //     fetchPackages(page_URL) {
  //       page_URL = page_URL || "https://pokeapi.co/api/v2/";
  //       fetch(page_URL)
  //         .then(res => res.json())
  //         .then(data => {
  //           this.packagesSend = res.data;
  //         });
  //     }
  //   }
  created() {
    axios
      .get(`https://api.vriendenkoerier.nl/api/packages/15`)
      .then(response => {
        // JSON responses are automatically parsed.
        this.packagesSend = response.data.data;
      })
      .catch(e => {
        this.errors.push(e);
      });
    //   mounted() {
    //     axios
    //       .get("https://api.vriendenkoerier.nl/api/packages")
    //       .then(response => (this.info = response));
    //   }
  }
};
</script>


