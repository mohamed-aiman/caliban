import './bootstrap';
import { createApp } from 'vue';
import { watch, ref, nextTick } from 'vue'
import axios from 'axios';
import Quill from "quill";
import "quill/dist/quill.core.css";
import "quill/dist/quill.bubble.css";
import "quill/dist/quill.snow.css";

createApp({
  data() {
    return {
      productSlug: null,
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
      descriptionEditor: null,
      descriptionEditorValue: '',
      uploadProgress: 0,
      images: {
        1: { key: 1, photo_id: null, url: null},
        2: { key: 2, photo_id: null, url: null},
        3: { key: 3, photo_id: null, url: null},
        4: { key: 4, photo_id: null, url: null},
      },
      locations: [],
      locationSearch: '',
      filteredLocations: [],
      selectedLocations: [
        // {id: 1, name: "Male' City"},
      ],
      selectedLocationId: null,
      categorySearch: '',
      filteredCategories: [],
      selectedCategoryId: null,
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
      }
    }
  },
  watch: {
      selectedLocationId: function(val, oldVal) {
        if (val) {
          this.addLocation(val)
        }
      },
      locationSearch: function(val, oldVal) {
        // if (val) {
          this.filterLocations(val)
        // }
      },
      selectedCategoryId: function(val, oldVal) {
        if (val) {
          this.setSelectedCategory(val)
        }
      },
      categorySearch: function(val, oldVal) {
        if (val) {
          this.filterCategories(val)
        }
      }
  },
  mounted() {
    this.productSlug = window.variables.slug;
    this.loadParentCategories();
    this.loadLocations();
    this.initDescriptionEditor();
    this.loadFormData();
  },
  methods: {
    initDescriptionEditor() {
      // var _this = this;
      this.descriptionEditor = new Quill(this.$refs.descriptionEditor, {
        modules: {
          toolbar: [
            [
              {
                header: [1, 2, 3, 4, false],
              },
            ],
            ["bold", "italic", "underline", "link"],
          ],
        },
        //theme: 'bubble',
        theme: "snow",
        formats: ["bold", "underline", "header", "italic", "link"],
        placeholder: "Type something in here!",
      });
      // this.descriptionEditor.on("text-change", function () {
      //   _this.descriptionEditorChanged();
      // });
    },
    // descriptionEditorChanged() {
      // console.log("descriptionEditorChanged");
      // console.log(this.descriptionEditor.root.innerHTML);
    // },
    captureDescription() {
      this.form.description =  this.descriptionEditor.root.innerHTML
    },
    async loadFormData() {
      const response = await axios.get(`/listings/${this.productSlug}/form-data`);
      const data = response.data;
      this.form = data.form;
      
      this.showCategorySelection = false;
      this.setSelectedCategory(this.form.category_id);
      this.selectedCategory = data.category;

      this.form.locations.forEach(id => {
        this.addLocation(id)
      })

      for (var key in this.images) {
        if (this.images.hasOwnProperty(key)) {
          if (this.form.photos[key-1]) {
            this.images[key].photo_id = data.photos[key-1].id;
            this.images[key].url = data.photos[key-1].url;
          }
        }
      }

      this.descriptionEditor.root.innerHTML = this.form.description;

      console.log(this.form);
    },
    async loadLocations() {
      const response = await axios.get('/locations/for-select');
      this.locations = response.data;
      this.filteredLocations = this.locations;
    },
    async filterLocations() {
      const response = await axios.get('/locations/for-select?search='+this.locationSearch);
      this.filteredLocations = response.data.filter(location => {
        return !this.selectedLocations.find(selectedLocation => selectedLocation.id === location.id);
      })
    },
    addLocation(id) {
        this.selectedLocations.push(this.locations.find(location => location.id == id))
        this.selectedLocationId = null
        //remove from filtered locations
        this.filteredLocations = this.locations.filter(
          location => !this.selectedLocations.find(selectedLocation => selectedLocation.id == location.id)
        )
    },
    removeLocation(id) {
      this.selectedLocations = this.selectedLocations.filter(location => location.id !== id);
      this.filterLocations();
    },
    async filterCategories() {
      console.log('filtering categories')
      const response = await axios.get('/categories/for-select?search='+this.categorySearch);
      this.filteredCategories = response.data;
      console.log(response.data)
    },
    async setSelectedCategory(id) {
      const response = await axios.get('/categories/'+id+'/levels');

      if (response.data.level1) {
        this.level1_id = response.data.level1.id
        this.loadLevel2()
      }
      if (response.data.level2) {
        this.level2_id = response.data.level2.id
        this.loadLevel3()
      }
      if (response.data.level3) {
        this.level3_id = response.data.level3.id
        this.loadLevel4()
      }
      if (response.data.level4) {
        this.level4_id = response.data.level4.id
        this.loadLevel5()
      }
      if (response.data.level5) {
        this.level5_id = response.data.level5.id
        this.loadLevel6()
      }
    },
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
    captureLocations() {
      this.form.locations = []
      this.selectedLocations.forEach(location => {
        this.form.locations.push(location.id)
      })
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
            this.form.photos.push(this.images[key].photo_id)
          }
        }
      }
    },
    async submitForm() {
      this.captureDescription()
      this.capurePhotos()
      this.captureLocations()
      axios.patch(`/listings/${this.productSlug}`, this.form)
        .then(response => {
          console.log(response)
          window.location.href = '/products/' + response.data.product.slug
        })
        .catch(error => {
          if (error.response.status == 422) {
            console.log(error.response.data)
            this.errors = error.response.data.errors
          }
        })
    }
  }
}).mount('#app')
