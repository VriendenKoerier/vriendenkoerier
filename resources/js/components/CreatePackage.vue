<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <b-form method="post" ref="form">
              <form-wizard
                @on-complete="formSubmit"
                :start-index="0"
                color="#20c997"
                title="Maak een nieuw pakket aan"
                subtitle="Vul hier alle gegevens in van het pakket dat u wilt verzenden"
                back-button-text="Vorige"
                next-button-text="Volgende"
                finish-button-text="Aanmaken"
              >
                <tab-content>
                  <b-form-group
                    class="text-justify"
                    id="input-group-1"
                    label="Naam:"
                    label-for="input-1"
                    for="name"
                  >
                    <b-input
                      required
                      type="text"
                      name="name"
                      class="mb-2 mr-sm-2 mb-sm-0"
                      v-model="name"
                    />
                  </b-form-group>
                  <b-form-group
                    class="text-justify"
                    id="input-group-2"
                    label="Titel:"
                    label-for="input-2"
                    for="title"
                  >
                    <b-input
                      required
                      type="text"
                      name="title"
                      class="mb-2 mr-sm-2 mb-sm-0"
                      v-model="title"
                    />
                  </b-form-group>
                  <b-form-group
                    class="text-justify"
                    id="input-group-3"
                    label="Beschrijving:"
                    label-for="input-3"
                    for="description"
                  >
                    <b-form-textarea
                      id="textarea"
                      v-model="description"
                      placeholder="Beschrijf hier uw product..."
                      name="description"
                      required
                    ></b-form-textarea>
                  </b-form-group>
                  <b-form-group id="input-group-4">
                    <b-form-checkbox
                      v-model="avg_confirmed"
                      id="checkboxes-4"
                      value="1"
                    >Ik ga accoord met voorwaarden</b-form-checkbox>
                  </b-form-group>
                </tab-content>
                <tab-content title="Afmetingen" icon="ti-settings">
                  <b-form-group
                    class="text-justify"
                    id="input-group-7"
                    label="Breette:"
                    label-for="input-7"
                    for="width"
                  >
                    <b-input
                      required
                      name="width"
                      type="number"
                      class="form-control"
                      v-model="width"
                    />
                  </b-form-group>

                  <b-form-group
                    class="text-justify"
                    id="input-group-4"
                    label="Hoogte:"
                    label-for="input-4"
                    for="height"
                  >
                    <b-input required type="number" v-model="height" />
                  </b-form-group>

                  <b-form-group
                    class="text-justify"
                    id="input-group-5"
                    label="Lengte:"
                    label-for="input-5"
                    for="lenght"
                  >
                    <b-input required type="number" class="form-control" v-model="lenght" />
                  </b-form-group>
                  <b-form-group
                    class="text-justify"
                    id="input-group-6"
                    label="Gewicht:"
                    label-for="input-6"
                    for="gewicht"
                  >
                    <b-input required type="number" class="form-control" v-model="weight" />
                  </b-form-group>
                </tab-content>
                <tab-content title="Contact" icon="ti-settings">
                  <b-form-group
                    class="text-justify"
                    id="input-group-8"
                    label="Foto's van het product:"
                    label-for="input-8"
                    for="photo"
                  >
                    <b-form-file
                      required
                      v-model="photo"
                      type="file"
                      accept="image/jpeg, image/png, image/gif"
                    ></b-form-file>
                  </b-form-group>
                </tab-content>

                <tab-content title="Last step" icon="ti-check">
                  <b-form-group
                    class="text-justify"
                    id="input-group-9"
                    label="Email:"
                    label-for="input-9"
                    for="email"
                  >
                    <b-input required type="email" class="form-control" v-model="email" />
                  </b-form-group>
                  <b-form-group
                    class="text-justify"
                    id="input-group-10"
                    label="Telefoon Nummer:"
                    label-for="input-10"
                    for="phone_number"
                  >
                    <b-input required type="tel" class="form-control" v-model="phone_number" />
                  </b-form-group>
                </tab-content>
                <tab-content title="Postcodes" icon="ti-check">
                  <b-form-group
                    class="text-justify"
                    id="input-group-6"
                    label="Verzend adres:"
                    label-for="input-6"
                    for="postcode_a"
                  >
                    <b-input required type="text" class="form-control" v-model="postcode_a" />
                  </b-form-group>
                  <b-form-group
                    class="text-justify"
                    id="input-group-6"
                    label="Ontvang adres:"
                    label-for="input-6"
                    for="postcode_b"
                  >
                    <b-input required type="text" class="form-control" v-model="postcode_b" />
                  </b-form-group>
                </tab-content>
                <tab-content>
                  <div>
                    <b-jumbotron
                      header="Bedankt voor het invullen!"
                      lead="Deel uw pakket op social media!"
                    >
                      <p>For more information visit website</p>
                      <b-button variant="primary" href="#">Share buttons</b-button>
                      <b-button variant="primary" href="#">Share buttons</b-button>
                    </b-jumbotron>
                  </div>
                </tab-content>
              </form-wizard>
            </b-form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  },
  data() {
    return {
      name: "",
      title: "",
      description: "",
      width: "",
      height: "",
      lenght: "",
      weight: "",
      photo: "",
      email: "",
      phone_number: "",
      postcode_a: "",
      postcode_b: "",
      avg_confirmed: 0
    };
  },
  methods: {
    formSubmit() {
      //   e.preventDefault();
      // this.$refs.form.submit();
      let currentObj = this;
      if (this.avg_confirmed == "1") {
        this.avg_confirmed = 1;
      }
      axios
        .post("https://api.vriendenkoerier.nl/api/package", {
          name: this.name,
          title: this.title,
          description: this.description,
          width: this.widht,
          height: this.height,
          lenght: this.lenght,
          weight: this.weight,
          photo: "sjfkjsdfh.png",
          email: this.email,
          phone_number: this.phone_number,
          postcode_a: this.postcode_a,
          postcode_b: this.postcode_b,
          avg_confirmed: this.avg_confirmed,
          show_hash: "lalalalala"
        })
        .then(function(response) {
          currentObj.output = response.data;
        })
        .catch(function(error) {
          currentObj.output = error;
        });
    },
    validateFirstStep() {
      return new Promise((resolve, reject) => {
        this.$refs.ruleForm.validate(valid => {
          resolve(valid);
        });
      });
    }
  }
};
</script>
