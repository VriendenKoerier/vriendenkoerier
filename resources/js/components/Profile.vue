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
                <li>Naam: </li>
                <li>Tea</li>
                <li>Aantal pakketten verzonden: { packages.sent }</li>
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
  created() {
    axios
      .get(`https://api.vriendenkoerier.nl/api/packages/9`)
      .then(response => {
        this.packagesSend = response.data.data;
      })
      .catch(e => {
        this.errors.push(e);
      });
  }
};
</script>
