@extends('layouts.user')

@section('body')

<div id="app">

    <h1>Add Listing</h1>


    {{-- <form action="{{ route('listings.store') }}" 
      method="POST" enctype="multipart/form-data" 
      @verbatim
      @submit.prevent="onSubmit"
      @endverbatim
    > --}}

        @csrf

        @verbatim

        <div class="grid grid-cols-1" v-if="selectedCategory && showCategorySelection">
          <p><span class="font-bold">Selected Category:</span> {{ selectedCategory.path }}</p>
          <button v-if="form.category_id" type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
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
        <div v-if="form.category_id" class="grid grid-cols-1 w-full">
        <!-- <div class="grid grid-cols-1 w-full mx-auto"> -->
          <div class="mb-6">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Category</label>
            <p v-text="selectedCategory.path" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
          </div>
          <div class="mb-6">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
            <input v-model="form.title" type="text" id="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
          </div>
          <div class="mb-6">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
            <quill-editor 
              theme="snow"
              v-model:content="content"
              :options="descriptionEditorOption"
              @ready="onDescriptionEditorReady($event)"
              @blur="onDescriptionEditorBlur($event)"
              >
            </quill-editor>
          </div>
          <div class="mb-6">
            <label for="condition" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Condition</label>
            <select v-model="form.condition" id="condition" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
              <option value="new">New</option>
              <option value="used_like_new">Used Like New</option>
              <option value="used">Used</option>
              <option value="refurbished">Refurbished</option>
              <option value="damaged">Damaged</option>
            </select>
          </div>
          <div class="mb-6">
            <label for="selling_format" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Condition</label>
            <select v-model="form.selling_format" id="selling_format" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
              <option value="classified">Classified</option>
              <option value="buy_now">Buy Now</option>
            </select>
          </div>
          <div class="mb-6">
            <label for="condition" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Location</label>
            <input type="text" id="condition" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
          </div>
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register new account</button>
        </div>
        @endverbatim
    {{-- </form> --}}
</div>
@endsection

@section('end-script')
<script src="{{ asset('js/list-item-page.js') }}"></script>
@endsection
