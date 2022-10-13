import './bootstrap';
import { createApp } from 'vue';
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import { watch, ref, nextTick } from 'vue'
import axios from 'axios';

  //to fix broken description editor on change event handler
  const content = ref('')
  let newContent = ''
  watch(content, newValue => {
    newContent = newValue
    console.log(newContent)
  })

  createApp({
    components: {
        QuillEditor
    },
    data() {
      return {
        form: {
          title: '',
          description: '',
          category_id: null,//id set to 101061 for testing null default
          condition: '',
          selling_format: '',
          duration: '',
          quantity: '',
          price: '',
          tax: '',
          locations: [],
          photos: [],
        },
        showCategorySelection: true,//set to false temporarily
        level1: [],
        level2: [],
        level3: [],
        level4: [],
        level5: [],
        level6: [],
        level1_id: 0,
        level2_id: 0,
        level3_id: 0,
        level4_id: 0,
        level5_id: 0,
        level5_id: 0,
        selectedCategory: {},
        descriptionQuillEditor: null,
        descriptionEditorOption: {
            theme: "snow",
            placeholder: "",
            modules: {
                toolbar: ["bold", "italic", "underline", "link", "clean"]
            },
        },
        uploadProgress: 0,
        images: {
          1: { key: 1, photo_id: null, url: null},
          2: { key: 2, photo_id: null, url: null},
          3: { key: 3, photo_id: null, url: null},
          4: { key: 4, photo_id: null, url: null},
        },
        errors: {
          title: [],
          description: [],
          category_id: [],
          condition: [],
          selling_format: [],
          duration: [],
          quantity: [],
          price: [],
          tax: [],
          locations: [],
          photos: [],
        },
      }
    },
    mounted() {
        this.loadParentCategories();
    },
    methods: {
      async loadParentCategories() {
        this.form.category_id = null
        const response = await fetch(`/parent-categories`)
        this.level1 = await response.json()
      },
      async loadCategories(id) {
        this.form.category_id = null
        const response = await fetch(`/categories/${id}/children`)
        return await response.json()
      },
      async loadLevel2() {
        this.resetLists(1)
        this.level2 = await this.loadCategories(this.level1_id)
        if (this.level2.length == 0) {
          this.form.category_id = this.level1_id
        }
      },
      async loadLevel3() {
        this.resetLists(2)
        this.level3 = await this.loadCategories(this.level2_id)
        if (this.level3.length == 0) {
          this.form.category_id = this.level2_id
        }
      },
      async loadLevel4() {
        this.resetLists(3)
        this.level4 = await this.loadCategories(this.level3_id)
        if (this.level4.length == 0) {
          this.form.category_id = this.level3_id
        }
      },
      async loadLevel5() {
        this.resetLists(4)
        this.level5 = await this.loadCategories(this.level4_id)
        if (this.level5.length == 0) {
          this.form.category_id = this.level4_id
        }
      },
      async loadLevel6() {
        this.resetLists(5)
        this.level6 = await this.loadCategories(this.level5_id)
        if (this.level6.length == 0) {
          this.form.category_id = this.level5_id
        }
      },
      resetLists(selectedLevel) {
        if (selectedLevel == 1) {
          this.level2 = []
          this.level2_id = 0
          this.level3 = []
          this.level3_id = 0
          this.level4 = []
          this.level4_id = 0
          this.level5 = []
          this.level5_id = 0
          this.level6 = []
          this.level6_id = 0
        } else if (selectedLevel == 2) {
          this.level3 = []
          this.level3_id = 0
          this.level4 = []
          this.level4_id = 0
          this.level5 = []
          this.level5_id = 0
          this.level6 = []
          this.level6_id = 0
        } else if (selectedLevel == 3) {
          this.level4 = []
          this.level4_id = 0
          this.level5 = []
          this.level5_id = 0
          this.level6 = []
          this.level6_id = 0
        } else if (selectedLevel == 4) {
          this.level5 = []
          this.level5_id = 0
          this.level6 = []
          this.level6_id = 0
        } else if (selectedLevel == 5) {
          this.level6 = []
          this.level6_id = 0
        } else {
          this.level2 = []
          this.level2_id = 0
          this.level3 = []
          this.level3_id = 0
          this.level4 = []
          this.level4_id = 0
          this.level5 = []
          this.level5_id = 0
          this.level6 = []
          this.level6_id = 0
        }
      },
      async categoryConfirmed() {
        const response = await fetch(`/categories/${this.form.category_id}`)
        this.selectedCategory = await response.json()
        this.showCategorySelection = false
      },
      changeCategory() {
        this.showCategorySelection = true
      },
      onDescriptionEditorReady($event) {
        this.descriptionQuillEditor = $event
      },
      onDescriptionEditorBlur($event) {
        this.captureDescription()
      },
      captureDescription() {
        this.form.description =  this.descriptionQuillEditor.root.innerHTML
        console.log(this.form)
      },
      onFileChange(e, key) {
        console.log(key);
        let file = e.target.files[0]
        this.readImage(file)
        console.log(file)
        this.uploadOriginalImage(file, key);
      },
      readImage(image) {
          let reader = new FileReader();
          reader.readAsDataURL(image);
      },
      uploadOriginalImage(file, key) {
          let formData = new FormData();
          formData.append('image', file, file.name);
          this.$emit('uploading');
          this.uploading = true;
          axios.post('/photos', formData, {
              onUploadProgress: progressEvent => {
                  this.uploadProgress = Math.round((progressEvent.loaded * 100) / progressEvent.total);
              }
          }).then(response => {
              this.finalImage = response.data.url;
              this.images[key] = {
                photo_id: response.data.id,
                url: response.data.url
              }
              this.uploading = false;
              console.log(response);
            }).catch(error => {
              console.log(error);
          });
      },
      deleteImage(key) {
        this.images[key] = {
          key: key,
          photo_id: null,
          url: null
        }
      },
      capurePhotos() {
        this.form.photos = []
        for (var key in this.images) {
          if (this.images.hasOwnProperty(key)) {
            if (this.images[key].photo_id != null) {
              this.form.photos.push({
                photo_id: this.images[key].photo_id,
                key: key
              })
            }
          }
        }
      },
      async submitForm() {
        this.captureDescription()
        this.capurePhotos()
        axios.post('/listings', this.form)
          .then(response => {
            console.log(response)
            window.location.href = '/products/' + response.data.product.slug
          })
          .catch(error => {
            if (error.response.status == 422) {
              console.log(error.response.data)
              this.errors = error.response.data.errors
              this.errors.photos = [];
              for (let i = 0; i < 4; i++) {
                let key = 'photos.'+i+'.photo_id';
                if (error.response.data.errors[key]) {
                  for (let j = 0; j < error.response.data.errors[key].length; j++) {
                    let errorText = error.response.data.errors[key][j];
                    errorText = errorText.replace(key, 'photo '+(i+1));
                    this.errors.photos.push(errorText)
                  }
                  // this.errors.photos[i]['photo_id'] = error.response.data.errors[key]
                }
              }
            }
          })
      }
    }
  }).mount('#app')
