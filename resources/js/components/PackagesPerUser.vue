<template>
  <div class="container">
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
                class="mb-2">
                <b-card-text>
                {{packet.description}}
                </b-card-text>

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
        </ul> -->
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
      edit: false
    };
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
      .get(`https://api.vriendenkoerier.nl/api/packages/user/12`)
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


