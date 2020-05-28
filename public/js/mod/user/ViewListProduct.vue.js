Vue.component('view-list-products', {
  data() {
    return {
      responseData: [],
    }
  },
  template: `
    <div v-for="data in this.responseData">
      <div class="single-products-catagory clearfix">
        <a :href="'/product/' + data.id">
          <img :src="data.image_product" alt="">
          <!-- Hover Content -->
          <div class="hover-content">
            <div class="line"></div>
            <p>{{data.price_product}}</p>
            <h4>{{data.name_product}}</h4>
          </div>
        </a>
      </div>
    </div>
  `,
  mounted: function () {
    getRequest('/products/getData', this.getData);
  },
  methods: {
    getData: function (responseData) {
      this.responseData = responseData;
    }
  }
})