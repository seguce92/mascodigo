<template>
  <div class="upload-image flex w-full justify-center flex-wrap">
    <div class="w-full">
      <input type="text" class="form-input" name="image" v-model="image">
    </div>
    <div class="w-full justify-center px-6 pt-2">
      <img :src="image" class="mx-auto max-w-md w-2/3" loading="lazy">
    </div>
    <div class="flex py-1 justify-center items-start pt-2">
      <label class="w-full flex inline-flex items-center justify-center px-4 py-1 bg-white text-blue rounded shadow-lg tracking-wide uppercase border border-blue-700 cursor-pointer hover:bg-blue hover:text-blue-700">
        <span class="text-sm leading-normal">subir archivo</span>
        <svg class="w-8 h-8 ml-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
          <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
        </svg>
        <input type='file' class="hidden" @change="coverUploader" :accept="setting.mime" />
      </label>
    </div>
  </div>
</template>

<script>
export default {
  props: ['value', 'url', 'options'],
  data: () => ({
    image: null,
    setting: {
      mime: 'image/*',
    }
  }),
  mounted() {
    if ( typeof this.options != "undefined" ) {
      Object.assign(this.setting, this.options)
    }
    if ( typeof this.value != "undefined" && this.value != '') {
      this.image = this.value
    } else {
      this.image = config.domain + 'img/image.svg'
    }
  },
  methods: {
    coverUploader (event) {
      let files = event.target.files
      let formData = new FormData()
      formData.append('image', files[0])
      
      $http.post(this.url, formData)
        .then((response) => {
          this.$swal('Archivo subido exitosamente');
          this.image = response.data.url
        }).catch(({response}) => {
          if (response.data.error) {
            this.$swal(response.data.error.message);
          } else {
            this.$swal(response.status + ' : Resource ' + response.statusText);
          }
        })
    }
  } 
}
</script>