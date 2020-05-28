Vue.component('table-home', {
  data() {
    return {
      responseData: [],
      dataCheckbox: [],
      checkOn: false,
    }
  },
  template: `
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col" class="col-checkbox" align="center">#</th>
        <th scope="col" align="center">ФИО</th>
        <th scope="col" class="col-access-user" align="center">Управление доступом</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="data in this.responseData">
        <td>{{data.id}}</td>
        <td><a :href="'/admin/users/' + data.id">{{data.name}}</a></td>
        <td>
          <div v-if="data.access === 'admin'">
            <input type="checkbox" class="checkboxAccess" checked>Администратор
          </div>
          <div v-else>
            <input type="checkbox">Администратор
          </div>
          </td>
      </tr>
    </tbody>
  </table>    
  `,
  mounted: function () {
    getRequest('/admin/getData', this.getData);
  },
  methods: {
    getData: function (responseData) {
      this.responseData = responseData;
    }
  }
})