@extends('layouts.user')

@section('body')

<div>
    <h1>Add Listing</h1>


    {{-- <form action="{{ route('listings.store') }}" 
      method="POST" enctype="multipart/form-data" 
      @verbatim
      @submit.prevent="onSubmit"
      @endverbatim
    > --}}

        @csrf

        @verbatim


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
          <div class="form-group" v-if="selectedCategory">
            <button v-if="form.category_id" type="button" 
              class="ml-3 bg-blue-500 
              hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
              @click="categoryConfirmed"
              >
              Confirm Category
            </button>
          </div>
        </div>

        <!-- form base on the selected category -->
        <!--  <div v-if="form.category_id != null" class="grid grid-cols-1 w-full"> -->
        <div v-if="!showCategorySelection" class="grid grid-cols-1 w-full mx-auto min-w-md">
          <div class="mb-6">
            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Category</label>
            <p  v-text="selectedCategory.path" class="shadow-sm bg-gray-50 
                    border border-gray-300 text-gray-900
                    text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
                    block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                    dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                    dark:focus:border-blue-500 dark:shadow-sm-light"
              >
            </p>
            <button type="button" 
              class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
              @click="changeCategory"
              >
              Change Category
            </button>
          </div>
          <div class="mb-6">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
            <input v-model="form.title" type="text" id="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
          </div>
          <div class="mb-6">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
            <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
              <quill-editor 
                style="min-height:300px;" 
                theme="snow"
                v-model:content="content"
                :options="descriptionEditorOption"
                @ready="onDescriptionEditorReady($event)"
                @blur="onDescriptionEditorBlur($event)"
                >
              </quill-editor>
            </div>
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
            <label for="selling_format" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Selling Format</label>
            <select v-model="form.selling_format" id="selling_format" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
              <option value="classified">Classified</option>
              <option value="buy_now">Buy Now</option>
            </select>
          </div>
          <div class="mb-6 border border-green-400 p-6" v-if="form.selling_format == 'classified'">
            <p class="mb-6 font-bold font-serif">Classified</p>
            <div class="flex items-center" id="classified-form">
              <label for="duration" class="mr-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                <p>Duration<span class="text-red-500">*</span></p></label>
                <select v-model="form.selling_format_details.duration" id="duration" class="mr-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                  <option value="1">1 day</option>
                  <option v-for="index in 59" :key="index" :value="index+1">{{ index+1 }} days</option>
                </select>
                
                <label for="duration" class="mr-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                  <p>Price<span class="text-red-500">*</span></p>
                </label>
                <input v-model="form.selling_format_details.price" type="number" id="price" class="mr-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                
                <label for="duration" class="mr-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Quantity</label>
              <input v-model="form.selling_format_details.quantity" type="number" id="price" class="mr-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
          </div>
          <div class="mb-6 border border-green-400 p-6" v-if="form.selling_format == 'buy_now'">
            <p class="mb-6 font-bold font-serif">Buy Now</p>
            <div class="" id="buy-now-form">
              <label for="duration" class="mb-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                <p>Duration<span class="text-red-500">*</span></p></label>
              <select v-model="form.selling_format_details.duration" id="duration" class="mb-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                <option value="1">1 day</option>
                <option v-for="index in 59" :key="index" :value="index+1">{{ index+1 }} days</option>
              </select>
              
              <label for="duration" class="mb-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                <p>Price<span class="text-red-500">*</span></p>
              </label>
              <input v-model="form.selling_format_details.price" type="number" id="price" class="mb-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>

              <label for="tax" class="mb-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                <p>Tax (<span class="text-xsm text-orange-600">Price entered should be inclusive of Tax</span>)</p></label>
              <select v-model="form.selling_format_details.tax" id="tax" class="mb-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                <option value="">Not Selected</option>
                <option value="GST" selected>GST 6%</option>
              </select>

              <label for="duration" class="mb-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Quantity</label>
              <input v-model="form.selling_format_details.quantity" type="number" id="price" class="mb-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
          </div>

          <div class="mb-6">
            <label for="condition" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Location</label>
            <input type="text" id="condition" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
          </div>
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
        </div>
        @endverbatim
    {{-- </form> --}}
</div>
@endsection

@section('end-script')
<script src="{{ asset('js/list-item-page.js') }}"></script>
@endsection
