<template>
  <div>
    <img :src="image" alt="" class="mb-2" loading="lazy">
    <select name="portlet" id="portlet" class="form-select" v-on:change="changeImage">
      <option v-for="(row, index) in images" 
        :key="index" :value="row.id" 
        :selected="domain + 'img/portlet/' + row.id == image">
        {{ row.name }}
      </option>
    </select>
  </div>
</template>

<script>
export default {
  props: ['value'],
  data: () => ({
    image: null,
    images: [
      {id: "image0.jpg", name: "Arbol de Piedra"},
      {id: "image1.jpg", name: "Lago Titi Caca (La Paz)"},
      {id: "image2.jpg", name: "Tupiza Bolivia"},
      {id: "image3.jpg", name: "Toroyo (Tupiza)"},
      {id: "image4.jpg", name: "Laguna (Uyuni)"},
      {id: "image5.jpg", name: "Zorro"},
      {id: "image6.jpg", name: "Cañon del Inca (Tupiza)"},
      {id: "image7.jpg", name: "Cañon del Inca 2 (Tupiza)"},
      {id: "image8.jpg", name: "Puerta del Diablo (Tupiza)"},
      {id: "image9.jpg", name: "Terminal de Busese (La Paz)"},
      {id: "image10.jpg", name: "Ciudad de La Paz"},
      {id: "image11.jpg", name: "Atardecer"},
      {id: "image12.jpg", name: "Anochecer"},
      {id: "image13.jpg", name: "Lago Titi Caca"},
      {id: "image14.jpg", name: "Paisaje Futirista"},
      {id: "image15.jpg", name: "Laguna Verde"},
      {id: "image16.jpg", name: "Lago Titi Caca 2"}
    ],
    domain: config.domain
  }),
  mounted() {
    if ( typeof this.value != "undefined" && this.value != '') {
      this.image = config.domain + 'img/portlet/' + this.value
    } else {
      this.image = config.domain + 'img/portlet/image0.jpg'
    }
    console.log(this.image)
  },
  methods: {
    changeImage: function (evt) {
      this.image = config.domain + 'img/portlet/' + evt.target.value;
    }
  } 
}
</script>