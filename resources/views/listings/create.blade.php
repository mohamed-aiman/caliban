@extends('layouts.dashboard')

@section('body')              
<div class="bg-gray-300 p-10">
    <h1>Add Listing</h1>

        @csrf

        @verbatim

        <div v-if="showCategorySelection" class="flex flex-wrap w-full">
          
          <div class="w-full mb-2">
            <input v-model="categorySearch"  type="text" id="categorySearch" placeholder="Type name of the category to search" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            <select v-model="selectedCategoryId" v-if="filteredCategories.length" :size="filteredCategories.length<5 ? filteredCategories.length+1 : 5"  id="category" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
              <option v-for="category in filteredCategories" :value="category.id" :key="category.id">{{ category.name }} {{ category.path ? ' | '+category.path : '' }}</option>
            </select>
          </div>


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
            <button :disabled="!form.category_id" 
              type="button"
              :class="{'bg-blue-500 hover:bg-blue-700 text-white': true, 'opacity-50 cursor-not-allowed': !form.category_id}"
              class="font-bold py-2 px-4 rounded ml-2"
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
            <p  @click="changeCategory"
              v-text="selectedCategory.path" class="shadow-sm bg-gray-50 
                    border border-gray-300 text-gray-900
                    text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
                    block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                    dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                    dark:focus:border-blue-500 dark:shadow-sm-light"
              >
            </p>
            <!-- <button type="button" 
              class="mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
              @click="changeCategory"
              >
              Change Category
            </button> -->
          </div>
          <div class="mb-6">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Title</label>
            <p v-if="errors.title" class="text-red-500 text-xs italic" v-text="errors.title[0]"></p>
            <input v-model="form.title" type="text" id="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
          </div>
          <div class="mb-6">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
            <p v-if="errors.description" class="text-red-500 text-xs italic" v-text="errors.description[0]"></p>
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
            <p v-if="errors.condition" class="text-red-500 text-xs italic" v-text="errors.condition[0]"></p>
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
            <p v-if="errors.selling_format" class="text-red-500 text-xs italic" v-text="errors.selling_format[0]"></p>
            <select v-model="form.selling_format" id="selling_format" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
              <option value="buy_now" selected>Buy Now</option>
              <option value="classified">Classified</option>
            </select>
          </div>
          <div class="mb-6 border border-green-400 p-6" v-if="form.selling_format == 'classified'">
            <p class="mb-6 font-bold font-serif">Classified</p>
            <div class="flex items-center" id="classified-form">
              <label for="duration" class="mr-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                <p>Duration<span class="text-red-500">*</span></p>
              </label>
              <p v-if="errors.duration" class="text-red-500 text-xs italic" v-text="errors.duration[0]"></p>
              <select v-model="form.duration" id="duration" class="mr-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                <option value="1">1 day</option>
                <option v-for="index in 59" :key="index" :value="index+1">{{ index+1 }} days</option>
              </select>
                
              <label for="price" class="mr-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                <p>Price<span class="text-red-500">*</span></p>
              </label>
                <p v-if="errors.price" class="text-red-500 text-xs italic" v-text="errors.price[0]"></p>
                <input v-model="form.price" type="number" id="price" class="mr-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                
              <label for="quantity" class="mr-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Quantity</label>
              <p v-if="errors.quantity" class="text-red-500 text-xs italic" v-text="errors.quantity[0]"></p>
              <input v-model="form.quantity" type="number" id="price" class="mr-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
          </div>
          <div class="mb-6 border border-green-400 p-6" v-if="form.selling_format == 'buy_now'">
            <p class="mb-6 font-bold font-serif">Buy Now</p>
            <div class="" id="buy-now-form">
              <label for="duration" class="mb-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                <p>Duration</p>
              </label>
              <p v-if="errors.duration" class="text-red-500 text-xs italic" v-text="errors.duration[0]"></p>
              <select v-model="form.duration" id="duration" class="mb-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                <option value="1">1 day</option>
                <option v-for="index in 59" :key="index" :value="index+1">{{ index+1 }} days</option>
              </select>
              
              <label for="price" class="mb-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                <p>Price<span class="text-red-500">*</span></p>
              </label>
              <p v-if="errors.price" class="text-red-500 text-xs italic" v-text="errors.price[0]"></p>
              <input v-model="form.price" type="number" id="price" class="mb-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>

              <label for="tax" class="mb-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                <p>Tax (<span class="text-xsm text-orange-600">Price entered should be inclusive of Tax</span>)</p>
              </label>
              <p v-if="errors.tax" class="text-red-500 text-xs italic" v-text="errors.tax[0]"></p>
              <select v-model="form.tax" id="tax" class="mb-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                <option value="" selected>Not Selected</option>
                <option value="GST_6%" selected>GST 6%</option>
              </select>

              <label for="quantity" class="mb-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Quantity</label>
              <p v-if="errors.quantity" class="text-red-500 text-xs italic" v-text="errors.quantity[0]"></p>
              <input v-model="form.quantity" type="number" id="price" class="mb-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
            </div>
          </div>

          <!-- add photos -->
          <div class="mb-6">
            <label for="photos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Photos</label>
            <div v-if="errors.photos.length>0">
              <p v-for="error in errors.photos" class="text-red-500 text-xs italic" v-text="error"></p>
            </div>
            <!-- <progress id="photo-upload-progress" :value="uploadProgress" max="100" class="w-full"> {{ uploadProgress }}% </progress> -->
            <div class="mb-6 border border-green-400 p-6">
              <div class="flex flex-wrap items-center" id="upload-photos">
                <!-- put image placeholder here -->
                <input type="file" @change="onFileChange($event,1)" ref="photo1" style="display: none">
                <div class="mr-6 flex flex-col items-center justify-center w-40 h-40 bg-gray-100 border-2 border-dashed border-gray-300 rounded-lg">
                  <div @click="$refs.photo1.value = null; $refs.photo1.click()" class="flex flex-col items-center justify-center" v-if="!images[1].url">
                    <svg class="w-32 h-32 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v28a2 2 0 002 2h24a2 2 0 002-2V8a2 2 0 00-2-2H14a2 2 0 00-2 2zm0 0v6h24V8H12z"></path>
                    </svg>
                  </div>
                  <div class="flex flex-col items-center justify-center" v-if="images[1].url">
                    <div class="w-full">
                      <button @click="deleteImage(1)" class="relative top-0 right-0 z-10 p-1 bg-red-500 rounded-full float-right">
                      <svg class="w-4 h-4 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                      </svg>
                      </button>
                    </div>
                    <img @click="$refs.photo1.value = null; $refs.photo1.click()" :src="images[1].url" class="w-32 h-32 text-gray-400">
                  </div>
                </div>
                <input type="file" @change="onFileChange($event,2)" ref="photo2" style="display: none">
                <div class="mr-6 flex flex-col items-center justify-center w-40 h-40 bg-gray-100 border-2 border-dashed border-gray-300 rounded-lg">
                  <div  @click="$refs.photo2.value = null; $refs.photo2.click()" class="flex flex-col items-center justify-center" v-if="!images[2].url">
                    <svg class="w-32 h-32 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v28a2 2 0 002 2h24a2 2 0 002-2V8a2 2 0 00-2-2H14a2 2 0 00-2 2zm0 0v6h24V8H12z"></path>
                    </svg>
                  </div>
                  <div class="flex flex-col items-center justify-center" v-if="images[2].url">
                    <div class="w-full">
                      <button @click="deleteImage(2)" class="relative top-0 right-0 z-10 p-1 bg-red-500 rounded-full float-right">
                      <svg class="w-4 h-4 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                      </svg>
                      </button>
                    </div>
                    <img  @click="$refs.photo2.value = null; $refs.photo2.click()" :src="images[2].url" class="w-32 h-32 text-gray-400">
                  </div>
                </div>
                <input type="file" @change="onFileChange($event,3)" ref="photo3" style="display: none">
                <div class="mr-6 flex flex-col items-center justify-center w-40 h-40 bg-gray-100 border-2 border-dashed border-gray-300 rounded-lg">
                  <div @click="$refs.photo3.value = null; $refs.photo3.click()" class="flex flex-col items-center justify-center"  v-if="!images[3].url">
                    <svg class="w-32 h-32 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v28a2 2 0 002 2h24a2 2 0 002-2V8a2 2 0 00-2-2H14a2 2 0 00-2 2zm0 0v6h24V8H12z"></path>
                    </svg>
                  </div>
                  <div class="flex flex-col items-center justify-center" v-if="images[3].url">
                    <div class="w-full">
                      <button @click="deleteImage(3)" class="relative top-0 right-0 z-10 p-1 bg-red-500 rounded-full float-right">
                      <svg class="w-4 h-4 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                      </svg>
                      </button>
                    </div>
                    <img @click="$refs.photo3.value = null; $refs.photo3.click()" :src="images[3].url" class="w-32 h-32 text-gray-400">
                  </div>
                </div>
                <input type="file" @change="onFileChange($event,4)" ref="photo4" style="display: none">
                <div class="mr-6 flex flex-col items-center justify-center w-40 h-40 bg-gray-100 border-2 border-dashed border-gray-300 rounded-lg">
                  <div @click="$refs.photo4.value = null; $refs.photo4.click()" class="flex flex-col items-center justify-center" v-if="!images[4].url">
                    <svg class="w-32 h-32 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v28a2 2 0 002 2h24a2 2 0 002-2V8a2 2 0 00-2-2H14a2 2 0 00-2 2zm0 0v6h24V8H12z"></path>
                    </svg>
                  </div>
                  <div class="flex flex-col items-center justify-center" v-if="images[4].url">
                    <div class="w-full">
                      <button @click="deleteImage(2)" class="relative top-0 right-0 z-10 p-1 bg-red-500 rounded-full float-right">
                      <svg class="w-4 h-4 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                      </svg>
                      </button>
                    </div>
                    <img @click="$refs.photo4.value = null; $refs.photo4.click()" :src="images[4].url" class="w-32 h-32 text-gray-400">
                  </div>
                </div>
                
              </div>
            </div>
          </div>

          <!-- add locations -->
          <div class="mb-6">
            <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Location</label>
            <p v-if="errors.locations" class="text-red-500 text-xs italic" v-text="errors.locations[0]"></p>
            <label for="selected-locations" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Selected Locations</label>
            <div class="flex flex-wrap my-2">
              <div v-for="location in selectedLocations" class="flex items-center justify-center px-2 py-1 m-1 text-xs font-medium leading-5 text-blue-800 bg-blue-100 rounded-full dark:bg-blue-800 dark:text-blue-100">
                <span class="mr-2">{{ location.name }}</span>
                <button @click="removeLocation(location.id)" type="button" class="bg-red-500 inline-flex items-center justify-center w-4 h-4 transition duration-150 ease-in-out rounded-full focus:outline-none focus:shadow-outline">
                  <svg class="w-3 h-3 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
                </button>
              </div>
            </div>
            <div class="w-72">
              <input v-model="locationSearch"  type="text" id="locationSearch" placeholder="Type name of the island,city to search" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
              <select v-if="filteredLocations.length>0" 
                name="selectedLocation" 
                :size="filteredLocations.length<9?filteredLocations.length+1 : 10"  
                v-model="selectedLocationId" 
                class="form-control w-full">
                <option v-for="location in filteredLocations" :value="location.id">{{ location.name }}</option>
              </select>
            </div>
          </div>

          <!-- add product attributes -->


          <button @click="submitForm" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
        </div>
        @endverbatim
</div>
@endsection

@section('end-script')
<script src="{{ asset('js/list-item-page.js') }}"></script>
@endsection
