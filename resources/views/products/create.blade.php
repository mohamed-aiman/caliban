@extends('layouts.user')

@section('body')

<div id="app">

    <h1>Add Listing</h1>


    <form action="{{ route('listings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @verbatim
        <div class="flex flex-wrap w-full">
          <p>Selected Category ID: {{ selectedCategory }}</p>
        </div>


        <div class="flex flex-wrap w-full">
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
        level1: @json($categories),
        level2: [],
        level3: [],
        level4: [],
        level5: [],
        level1_id: 0,
        level2_id: 0,
        level3_id: 0,
        level4_id: 0,
        level5_id: 0,
        selectedCategory: null,
      }
    },
    methods: {
      async loadCategories(id) {
        const response = await fetch(`/categories/${id}/children`)
        return await response.json()
      },
      async loadLevel2() {
        this.resetLists(1)
        this.level2 = await this.loadCategories(this.level1_id)
        this.selectedCategory = this.level1_id
      },
      async loadLevel3() {
        this.resetLists(2)
        this.level3 = await this.loadCategories(this.level2_id)
        this.selectedCategory = this.level2_id
      },
      async loadLevel4() {
        this.resetLists(3)
        this.level4 = await this.loadCategories(this.level3_id)
        this.selectedCategory = this.level3_id
      },
      async loadLevel5() {
        this.resetLists(4)
        this.level5 = await this.loadCategories(this.level4_id)
        this.selectedCategory = this.level4_id
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
        } else if (selectedLevel == 2) {
          this.level3 = []
          this.level3_id = 0
          this.level4 = []
          this.level4_id = 0
          this.level5 = []
          this.level5_id = 0
        } else if (selectedLevel == 3) {
          this.level4 = []
          this.level4_id = 0
          this.level5 = []
          this.level5_id = 0
        } else if (selectedLevel == 4) {
          this.level5 = []
          this.level5_id = 0
        } else {
          this.level2 = []
          this.level2_id = 0
          this.level3 = []
          this.level3_id = 0
          this.level4 = []
          this.level4_id = 0
          this.level5 = []
          this.level5_id = 0
        }
      }
    }
  }).mount('#app')
</script>
@endsection
