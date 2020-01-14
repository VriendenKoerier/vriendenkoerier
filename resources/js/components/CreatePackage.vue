<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div
          class="card"
          style="border: none;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"
        >
          <form
            method="post"
            ref="form"
            id="form"
            name="form"
            @submit.prevent="submit"
            enctype="multipart/form-data"
          >
            <form-wizard
              :start-index="0"
              color="#026473"
              title="Maak een nieuw pakket aan"
              subtitle="Vul hier alle gegevens in van het pakket dat u wilt verzenden"
              back-button-text="Vorige"
              next-button-text="Volgende"
              finish-button-text="Aanmaken"
            >
              <tab-content>
                <!-- <b-form-group
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
                </b-form-group>-->
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
                <b-form-group class="text-justify">
                  <b-form-checkbox
                    v-model="avg_confirmed"
                    id="checkboxes-4"
                    value="1"
                  >Ik ga accoord met voorwaarden</b-form-checkbox>
                </b-form-group>
              </tab-content>
              <tab-content>
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
                  for="length"
                >
                  <b-input required type="number" class="form-control" v-model="length" />
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
              <tab-content>
                <b-form-group
                  class="text-justify"
                  id="input-group-8"
                  label="Foto's van het product:"
                  label-for="file"
                  for="file"
                >
                  <b-form-file
                    required
                    name="file"
                    v-model="file"
                    type="file"
                    id="file"
                    ref="file"
                    accept="image/jpeg, image/png, image/gif"
                  ></b-form-file>
                </b-form-group>
              </tab-content>

              <tab-content>
                <b-form-group
                  class="text-justify"
                  id="input-group-10"
                  label="Contact gegevens"
                  label-for="input-10"
                  for="contact"
                >
                  <b-input required type="text" class="form-control" v-model="contact" />
                </b-form-group>
              </tab-content>
              <tab-content>
                <b-form-group
                  class="text-justify"
                  id="input-group-6"
                  label="Verzend postcode:"
                  label-for="input-6"
                  for="postcode_a"
                >
                  <b-input
                    required
                    type="text"
                    placeholder="Postcode"
                    class="form-control"
                    v-model="postcode_a"
                  />
                </b-form-group>
                <b-form-group
                  class="text-justify"
                  id="input-group-6"
                  label="Verzend adres:"
                  label-for="input-6"
                  for="adres_a"
                >
                  <b-input
                    required
                    type="text"
                    placeholder="Adres"
                    class="form-control"
                    v-model="adres_a"
                  />
                </b-form-group>
                <b-form-group
                  class="text-justify"
                  id="input-group-6"
                  label="Ontvang Postcode:"
                  label-for="input-6"
                  for="adres_b"
                >
                  <b-input
                    required
                    type="text"
                    placeholder="Postcode"
                    class="form-control"
                    v-model="postcode_b"
                  />
                </b-form-group>
                <b-form-group
                  class="text-justify"
                  id="input-group-6"
                  label="Ontvang adres:"
                  label-for="input-6"
                  for="adres_b"
                >
                  <b-input
                    required
                    type="text"
                    placeholder="Adres"
                    class="form-control"
                    v-model="adres_b"
                  />
                </b-form-group>
              </tab-content>
              <tab-content>
                <div>
                  <b-jumbotron
                    header="Bedankt voor het invullen!"
                    lead="Deel uw pakket op social media!"
                  ></b-jumbotron>
                </div>
              </tab-content>
              <template slot="footer" slot-scope="props">
                <div class="wizard-footer-left">
                  <wizard-button
                    v-if="props.activeTabIndex > 0 && !props.isLastStep"
                    @click.native="props.prevTab()"
                    :style="props.fillButtonStyle"
                  >Vorige</wizard-button>
                </div>
                <div class="wizard-footer-right">
                  <wizard-button
                    v-if="!props.isLastStep"
                    @click.native="props.nextTab()"
                    class="wizard-footer-right"
                    :style="props.fillButtonStyle"
                  >Volgende</wizard-button>

                  <wizard-button
                    v-else
                    v-bind:disabled="hasClicked"
                    @click.native="formSubmit"
                    class="wizard-footer-right finish-button"
                    :style="props.fillButtonStyle"
                  >{{props.isLastStep ? 'Done' : 'Next'}}</wizard-button>
                </div>
              </template>
            </form-wizard>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
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
    } else {
      this.$router.push("login");
    }
  },
  data() {
    return {
      title: "",
      description: "",
      width: "",
      height: "",
      length: "",
      weight: "",
      file: "",
      contact: "",
      postcode_a: "",
      postcode_b: "",
      adres_a: "",
      adres_b: "",
      avg_confirmed: 0,
      token_string: "",
      formData: "",
      imagefile: "",
      hasClicked: false
    };
  },
  methods: {
    formSubmit() {
      this.hasClicked = true;
      if (this.avg_confirmed == "1") {
        this.avg_confirmed = 1;
      }

      var config = {
        headers: {
          Authorization: `Bearer ${this.token_string}`
          // 'Content-Type': 'multipart/form-data',
          // 'Content-Type': 'application/x-www-form-urlencoded',
          // 'X-Requested-With': 'XMLHttpRequest'
        }
      };

      var formData = new FormData();

      // append string
      formData.append("title", this.title);
      formData.append("description", this.description);
      formData.append("height", this.height);
      formData.append("width", this.width);
      formData.append("length", this.length);
      formData.append("weight", this.weight);
      formData.append("photo", this.file, this.file.name);
      formData.append("contact", this.contact);
      formData.append("postcode_a", this.postcode_a);
      formData.append("postcode_b", this.postcode_b);
      formData.append("adres_a", this.adres_a);
      formData.append("adres_b", this.adres_b);
      formData.append("avg_confirmed", this.avg_confirmed);

      var bodyParameters = {
        title: this.title,
        description: this.description,
        height: this.height,
        width: this.width,
        length: this.length,
        weight: this.weight,
        photo: this.file,
        contact: this.contact,
        postcode_a: this.postcode_a,
        postcode_b: this.postcode_b,
        adres_a: this.adres_a,
        adres_b: this.adres_b,
        avg_confirmed: this.avg_confirmed
      };

      axios
        .post("/package", formData, config)
        .then(response => {
          this.hasClicked = false;
          this.$router.push("/");
          // console.log(response)
        })
        .catch(error => {
          this.hasClicked = false;

          // console.log(error)
          // console.log(bodyParameters)
          // console.log(this.file)
          // console.log(this.file.name)
        });
    }
    // onChangeFileUpload() {
    //   this.file = this.$refs.file.files[0];
    // }
    // validateFirstStep() {
    //   return new Promise((resolve, reject) => {
    //     this.$refs.ruleForm.validate(valid => {
    //       resolve(valid);
    //     });
    //   });
    // }
  }
};
</script>
