Vue.component('table-list-product', {
  data() {
    return {
      responseData: [],
    }
  },
  template: `
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col" class="col-checkbox" align="center">#</th>
          <th scope="col" align="center">Название продукта</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="data in this.responseData">
          <td>{{ data.id}}</td>
          <td><a :href="'/admin/product/' + data.id + '/edit'">{{ data.name_product}}</a></td>
        </tr>
      </tbody>
    </table>
  `,
  mounted: function () {
    getRequest('/admin/product/getData', this.getData);
  },
  methods: {
    getData: function (responseData) {
      this.responseData = responseData;
    }
  }
})