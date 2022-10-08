@extends('layouts.user')

@section('body')

<div id="app">

    <h1>Add Listing</h1>


    <form action="{{ route('listings.store') }}" 
      method="POST" enctype="multipart/form-data" 
      @verbatim
      @submit.prevent="onSubmit"
      @endverbatim
    >

        @csrf

        @verbatim
        <div class="grid grid-cols-1" v-if="selectedCategory">
          <p><span class="font-bold">Selected Category:</span> {{ selectedCategory.path }}</p>
          <button v-if="selectedCategoryId" type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
            @click="categoryConfirmed"
            v-text="categoryConfirmButtonText"
            >
          </button>
        </div>


        <div v-if="showCategorySelection" class="flex flex-wrap w-full">
          <div class="form-group">
              <select name="level1_id" :size="level1.length+1" v-model="level1_id" class="form-control" @change="loadLevel2()">
                  <option v-for="category in level1" :value="category.id">{{ category.name }}</option>
              </select>
          </div>

          <div class="form-group" v-if="level2.length>0">
              <select name="level2_id" :size="level2.length+1" v-model="level2_id" class="form-control" @change="loadLevel3()">
                  <option v-for="category in level2" :value="category.id">{{ category.name }}</option>
              </select>
          </div>

          <div class="form-group" v-if="level3.length>0">
              <select name="level3_id" :size="level3.length+1" v-model="level3_id" class="form-control" @change="loadLevel4()">
                  <option v-for="category in level3" :value="category.id">{{ category.name }}</option>
              </select>
          </div>

          <div class="form-group" v-if="level4.length>0">
              <select name="level4_id" :size="level4.length+1" v-model="level4_id" class="form-control" @change="loadLevel5()">
                  <option v-for="category in level4" :value="category.id">{{ category.name }}</option>
              </select>
          </div>

          <div class="form-group" v-if="level5.length>0">
              <select name="level5_id" :size="level5.length+1" v-model="level5_id" class="form-control" @change="loadLevel6()">
                  <option v-for="category in level5" :value="category.id">{{ category.name }}</option>
              </select>
          </div>
        </div>

        <!-- form base on the selected category -->
        <div v-if="selectedCategoryId" class="grid grid-cols-1">
          <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" class="form-control" id="title" placeholder="Title">
          </div>

          <div class="form-group">
              <label for="description">Description</label>
              <textarea name="description" class="form-control" id="description" placeholder="Description"></textarea>
          </div>

          <div class="form-group">
              <label for="price">Price</label>
              <input type="text" name="price" class="form-control" id="price" placeholder="Price">
          </div>

          <div class="form-group">
              <label for="image">Image</label>
              <input type="file" name="image" class="form-control" id="image" placeholder="Image">
          </div>
        </div>

        @endverbatim
        


    </form>

</div>
@endsection

@section('end-script')
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script>
  const { createApp } = Vue

  createApp({
    data() {
      return {
        showCategorySelection: true,
        level1: @json($categories),
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
        selectedCategoryId: null,
        selectedCategory: {},
        categoryConfirmButtonText: 'Confirm Category',
      }
    },
    methods: {
      async loadCategories(id) {
        this.selectedCategoryId = null
        const response = await fetch(`/categories/${id}/children`)
        return await response.json()
      },
      async loadLevel2() {
        this.resetLists(1)
        this.level2 = await this.loadCategories(this.level1_id)
        if (this.level2.length == 0) {
          this.selectedCategoryId = this.level1_id
        }
      },
      async loadLevel3() {
        this.resetLists(2)
        this.level3 = await this.loadCategories(this.level2_id)
        if (this.level3.length == 0) {
          this.selectedCategoryId = this.level2_id
        }
      },
      async loadLevel4() {
        this.resetLists(3)
        this.level4 = await this.loadCategories(this.level3_id)
        if (this.level4.length == 0) {
          this.selectedCategoryId = this.level3_id
        }
      },
      async loadLevel5() {
        this.resetLists(4)
        this.level5 = await this.loadCategories(this.level4_id)
        if (this.level5.length == 0) {
          this.selectedCategoryId = this.level4_id
        }
      },
      async loadLevel6() {
        this.resetLists(5)
        this.level6 = await this.loadCategories(this.level5_id)
        if (this.level6.length == 0) {
          this.selectedCategoryId = this.level5_id
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
        if (!this.showCategorySelection) {
          this.showCategorySelection = true;
          this.categoryConfirmButtonText = 'Confirm Category'
          return;
        }
        const response = await fetch(`/categories/${this.selectedCategoryId}`)
        this.selectedCategory = await response.json()
        this.showCategorySelection = false
        this.categoryConfirmButtonText = 'Change Category'
      }
    }
  }).mount('#app')
</script>
@endsection
