<template>
  <div id="app">
    <div class="row">
      <div class="col-md-12">
        <li v-for="item in posts">
          {{ item.id }} : {{ item.title }}
        </li>
      </div>
    </div>
    <b-pagination size="md" :total-rows="100" v-model="currentPage" :per-page="10" @input="getPostData(currentPage)">
    </b-pagination>

    <div>currentPage: {{currentPage}}</div>
  </div>
</template>
<script>
export default {
  name: 'app',
  data () {
    return {
      title: 'Vue.js Pagination Example With Bootstrap',
      currentPage: 1,
      limit: 5,
      posts: []
    }
  },
  methods: {
    // Fetches posts when the component is created.
    getPostData (currentPage) {
      axios.get('http://api.vriendenkoerier.nl/package/'+this.currentPage)
      .then(response => {
        console.log(response)
        // JSON responses are automatically parsed.
        this.posts = response.data
      })
      .catch(e => {
        this.errors.push(e)
      })
    }
  },
  mounted(currentPage){
    this.getPostData(currentPage)
  }
}
</script>

// <script>
// export default {
//   data() {
//     return {
//       packagesSend: [],
//       packet: {
//         id: "",
//       },
//       packet_id: "",
//       edit: false
//     };
//   },
//   created() {
//     axios
//       .get(`https://api.vriendenkoerier.nl/api/packages/${pageNum}`)
//       .then(response => {
//         // JSON responses are automatically parsed.
//         this.packagesSend = response.data.data;
//       })
//       .catch(e => {
//         this.errors.push(e);
//       });
//   }
// };
// </script>

