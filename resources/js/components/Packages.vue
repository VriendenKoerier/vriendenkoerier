<template>
  <div class="container">
    <div class="row justify-content-center">
      <div v-for="packet in packagesSend" v-bind:key="packet.id">
        <ul>
          <li>{{ packet.title }}</li>
          <li>{{ packet.name }}</li>
          <li>{{ packet.description }}</li>
          <li>{{ packet.height }}</li>
          <li>{{ packet.widht }}</li>
          <li>{{ packet.lenght }}</li>
          <li>{{ packet.weight }}</li>
          <li>{{ packet.photo }}</li>
          <li>{{ packet.email }}</li>
          <li>{{ packet.phone_number }}</li>
          <li>{{ packet.postcode_a }}</li>
          <li>{{ packet.postcode_b }}</li>
        </ul>
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
      .get(`https://api.vriendenkoerier.nl/api/packages`)
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
