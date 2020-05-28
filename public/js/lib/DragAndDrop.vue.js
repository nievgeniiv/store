Vue.component('draganddrop', {
  props: {

  },
  data() {
    return {
      dropArea: null,
      result: null,
      progressBar: null,
      uploadPercentage: 0,
      imageFiles: [],
      complete: ''
    }
  },
  template: `
      <div id="drop-area">
        <div class="row"><div class="col">Перетащите сюда файлы с изображением продукта</div></div>
        <div class="row"><div class="col"><progress max="100" :value.prop="uploadPercentage"></progress></div></div>
        <div class="row">
          {{ this.complete }}
          <div class="row" v-for="image in imageFiles">
            <div class="col">
              <img :src="image">
              <div class="row"><div class="col"><progress max="100" :value.prop="uploadPercentage"></progress></div></div>
            </div>
          </div>
        </div>  
      </div>
  `,
  mounted() {
    this.dropArea = document.getElementById("drop-area");
    this.result = document.getElementById("result");
    this.dropArea.addEventListener("drop", this.drop);
    this.dropArea.addEventListener("dragover", this.dragover);
    this.dropArea.addEventListener("dragleave", this.dragleave);
  },
  methods: {
    drop: function (e) {
      e.preventDefault();
      for (let i = 0; i < e.dataTransfer.files.length; i++) {
        let file = e.dataTransfer.files[i];
        let reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = function() {
          this.imageFiles.push(reader.result);
        }
        this.sendFile(file);
      }
      this.dropArea.classList.add('inactive');
    },
    dragover: function (e) {
      this.dropArea.classList.add('active');
      e.preventDefault();
    },
    dragleave: function (e) {
      this.dropArea.classList.add('inactive');
      e.preventDefault();
    },
    sendFile: function (file) {
      let formData = new FormData();
      formData.append('image', file);
      formData.append('name', app.nameProduct);
      axios.post('/admin/product/create/file',
        formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          },
          onUploadProgress: function (progressEvent) {
            this.uploadPercentage = parseInt(Math.round((progressEvent.loaded * 100) / progressEvent.total));
          }.bind(this)
        }
      ).then(function () {
        this.complete = '<div class="alert alert-success">Ваши файлы успешно загружены!</div>';
      })
        .catch(function () {
          this.complete = '<div class="alert alert-danger">Произошла ошибка при загрузке файлов! Обратитесь к ' +
                          'администратору</div>';
        });
    }
  }
})

