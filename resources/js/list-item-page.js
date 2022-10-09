import './bootstrap';
import { createApp } from 'vue';
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import { watch, ref, nextTick } from 'vue'

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
          category_id: null, //101061,//id set to 101061 for testing null default
          condition: '',
          selling_format: '',
          duration: '',
          quantity: '',
          price: '',
          tax: '',
          locations: [],
          images: [],
          photo1Url: null,
          photo2Url: null,
          photo3Url: null,
          photo4Url: null,
          photo5Url: null,
        },
        showCategorySelection: true, //false,//set to false temporarily
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
        this.form.description =  this.descriptionQuillEditor.root.innerHTML;
        console.log(this.form)
      },
      onFileChange(e) {
        var files = e.target.files || e.dataTransfer.files;
        console.log(files)
        if (!files.length)
          return;
        this.createImage(files[0]);
      },
      createImage(file) {
        var image = new Image();
        var reader = new FileReader();
        var vm = this;

        reader.onload = (e) => {
          vm.image = e.target.result;
        };
        reader.readAsDataURL(file);
      },
      removeImage: function (e) {
        this.image = '';
      },
      async submit() {
        this.captureDescription()
        const response = await fetch(`/listings`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(this.form)
        })
        const data = await response.json()
        console.log(data)
      }
    }
  }).mount('#app')
