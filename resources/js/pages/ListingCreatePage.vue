

<script setup>
import { watch, ref, onMounted, reactive } from 'vue'
import axios from 'axios';
import Quill from "quill";
import "quill/dist/quill.core.css";
// import "quill/dist/quill.bubble.css";
import "quill/dist/quill.snow.css";
// import { CategoryService } from '@/services/CategoryService'
// import { LocationService } from '@/services/LocationService'
const form = reactive({
    title: '',
    description: '',
    description_delta: '',
    category_id: '',//id set to 101061 for testing null default
    condition: '',
    selling_format: '',
    duration: '',
    quantity: '',
    price: '',
    tax: '',
    locations: [],
    photos: [],
})
const showCategorySelection = ref(true)//set to false temporarily
const selectedLevelIds = reactive({ 
    level1: "",
    level2: "",
    level3: "",
    level4: "",
    level5: "",
    level6: "",
})
const levelLists = ref({
    level1: [],
    level2: [],
    level3: [],
    level4: [],
    level5: [],
    level6: [],
})
const selectedCategory = ref({})
const descriptionEditorRef = ref('')
const descriptionEditor = ref('')
const descriptionEditorValue = ref('')
const uploading = ref(false)
const uploadProgress = ref(0)
const finalImage = ref('')
const photo1 = ref('')
const photo2 = ref('')
const photo3 = ref('')
const photo4 = ref('')
const images = ref({
    1: { key: 1, photo_id: null, url: null },
    2: { key: 2, photo_id: null, url: null },
    3: { key: 3, photo_id: null, url: null },
    4: { key: 4, photo_id: null, url: null },
})
const locations = ref([])
const locationSearch = ref('')
const filteredLocations = ref([])
const selectedLocations = ref([])
const selectedLocationId = ref('')
const categorySearch = ref('')
const filteredCategories = ref([])
const selectedCategoryId = ref('')
const errors = ref({
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
})
//deep watch to preserve old and new values
watch(() => ({ ...selectedLevelIds }), (newVal, oldVal) => {
    console.log('selectedLevelIds changed', newVal, oldVal)
    
    for (var level in newVal) {
        // console.log(key, newVal[key], oldVal[key])
        if (newVal[level] != oldVal[level]) {
            console.log('level changed', level, newVal[level], oldVal[level])
            loadLevel(level, newVal[level])
        }
    }
})
watch(selectedLocationId, (val, oldVal) => {
    if (val) {
        addLocation(val)
    }
})
watch(locationSearch, (val, oldVal) => {
    // if (val) {
    filterLocations(val)
    // }
})
watch(selectedCategoryId, (val, oldVal) => {
    console.log('watch selectedCategoryId changed from: ' + oldVal + ' to:' + val)
    if (val) {
        setSelectedCategory(val)
    }
})
watch(categorySearch, (val, oldVal) => {
    if (val) {
        filterCategories(val)
    }
})
onMounted(() => {
    loadParentCategories();
    loadLocations();
    initDescriptionEditor();
})
const initDescriptionEditor = () => {
    // var _this = this;
    descriptionEditor.value = new Quill(descriptionEditorRef.value, {
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
        // theme: 'bubble',
        theme: "snow",
        formats: ["bold", "underline", "header", "italic", "link"],
        placeholder: "Type something in here!",
    });
    // descriptionEditor.on("text-change", function () {
    //   _descriptionEditorChanged();
    // });
}
// const descriptionEditorChanged = () => {
// }
const captureDescription = () => {
    form.description = descriptionEditor.value.root.innerHTML
}
const loadLocations = async () => {
    // const response = LocationService.forSelect()
    const response = await axios.get('/api/locations/for-select');
    locations.value = response.data;
    filteredLocations.value = locations;
}
const filterLocations = async () => {
    // const response = LocationService.forSelect(locationSearch.value)
    const response = await axios.get('/api/locations/for-select?search=' + locationSearch.value);
    filteredLocations.value = response.data.filter(location => {
        return !selectedLocations.value.find(selectedLocation => selectedLocation.id === location.id);
    })
}
const addLocation = (id) => {
    selectedLocations.value.push(locations.value.find(location => location.id == id))
    selectedLocationId.value = null
    //remove from filtered locations
    filteredLocations.value = locations.value.filter(
        location => !selectedLocations.value.find(selectedLocation => selectedLocation.id == location.id)
    )
}
const removeLocation = (id) => {
    selectedLocations.value = selectedLocations.value.filter(location => location.id !== id);
    filterLocations();
}
const filterCategories = async () => {
    // const response = CategoryService.forSelect(categorySearch.value)
    const response = await axios.get('/api/categories/for-select?search=' + categorySearch.value);
    filteredCategories.value = response.data;
}
const setSelectedCategory = async (id) => {
    console.log('setSelectedCategory id: ' + id)
    // const response = CategoryService.levels(id)
    const response = await axios.get('/api/categories/' + id + '/levels');
    const selected = selectedLevelIds;
    console.log('selected', selected)
    if (response.data.level1) {
        selected.level1 = response.data.level1.id
        console.log('setSelCat level1_id: ' + selected.level1)
    }
    if (response.data.level2) {
        selected.level2 = response.data.level2.id
        console.log('setSelCat level2_id: ' + selected.level2)
    }
    if (response.data.level3) {
        selected.level3 = response.data.level3.id
        console.log('setSelCat level3_id: ' + selected.level3)
    }
    if (response.data.level4) {
        selected.level4 = response.data.level4.id
        console.log('setSelCat level4_id: ' + selected.level4)
    }
    if (response.data.level5) {
        selected.level5 = response.data.level5.id
        console.log('setSelCat level5_id: ' + selected.level5)
    }
    selectedLevelIds.value = selected
}
const loadParentCategories = async () => {
    form.category_id = null
    // const response = CategoryService.parents(`original`)
    const response = await fetch(`/api/parent-categories?type=original`)
    levelLists.value.level1 = await response.json()
}
const loadCategories = async (id) => {
    form.category_id = null
    // const response = CategoryService.children(id)
    const response = await fetch(`/api/categories/${id}/children`)
    return await response.json()
}
const loadLevel = async (selectedLevel, selectedValue) => {
    console.log('loadLevel selectedLevel: ' + selectedLevel)
    console.log('loadLevel selectedValue: ' + selectedValue)
    const currentLevel = parseInt(selectedLevel.replace(/[^0-9]/g, ''))
    resetLists(currentLevel)
    const nextLevel = currentLevel + 1
    levelLists.value['level' + nextLevel] = await loadCategories(selectedValue)
    if (levelLists.value['level' + nextLevel].length == 0) {
        form.category_id = selectedValue
    } else {
        form.category_id = null
    }
}
const resetLists = (currentLevel) => {
    console.log('resetLists currentLevel: ' + currentLevel)
    for (var i = currentLevel + 1; i <= 5; i++) {
        console.log('reseting level: ' + i)
        levelLists.value['level' + i] = []
    }
}
const categoryConfirmed = async () => {
    // const response = CategoryService.item(form.category_id)
    const response = await fetch(`/api/categories/${form.category_id}`)
    selectedCategory.value = await response.json()
    showCategorySelection.value = false
}
const changeCategory = () => {
    showCategorySelection.value = true
}
const onDescriptionEditorReady = ($event) => {
    descriptionQuillEditor.value = $event
}
const onDescriptionEditorBlur = ($event) => {
    captureDescription()
}
const captureLocations = () => {
    form.locations.value = []
    selectedLocations.value.forEach(location => {
        form.locations.push(location.id)
    })
}
const onFileChange = (e, key) => {
    let file = e.target.files[0]
    readImage(file)
    uploadOriginalImage(file, key);
}
const readImage = (image) => {
    let reader = new FileReader();
    reader.readAsDataURL(image);
}
const uploadOriginalImage = (file, key) => {
    let formData = new FormData();
    formData.append('image', file, file.name);
    // $emit('uploading');
    uploading.value = true;
    axios.post('/api/photos', formData, {
        onUploadProgress: progressEvent => {
            uploadProgress.value = Math.round((progressEvent.loaded * 100) / progressEvent.total);
        }
    }).then(response => {
        finalImage.value = response.data.url;
        images.value[key] = {
            photo_id: response.data.id,
            url: response.data.url
        }
        uploading.value = false;
    }).catch(error => {
    });
}
const deleteImage = (key) => {
    images.value[key] = {
        key: key,
        photo_id: null,
        url: null
    }
}
const capurePhotos = () => {
    form.photos = []
    for (var key in images.value) {
        if (images.value.hasOwnProperty(key)) {
            if (images.value[key].photo_id != null) {
                form.photos.push(images.value[key].photo_id)
            }
        }
    }
}
const submitForm = async () => {
    captureDescription()
    capurePhotos()
    captureLocations()
    axios.post('/api/listings', form)
        .then(response => {
            //@todo add route push here and proceed to preview before publishing
            window.location.href = '/products/' + response.data.product.slug
        })
        .catch(error => {
            if (error.response.status == 422) {
                errors.value = error.response.data.errors
            }
        })
}
</script>

<template>
    <div class="w-full xl:w-9/12">
        <div class="container mx-auto">
            <h1 class="text-3xl font-bold mb-5">Add Listing</h1>
            <div v-show="showCategorySelection" class="flex flex-wrap w-full">

                <div class="w-full mb-2">
                    <input v-model="categorySearch" type="text" id="categorySearch"
                        placeholder="Type name of the category to search"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required>
                    <select v-model="selectedCategoryId" v-if="filteredCategories.length"
                        :size="filteredCategories.length<5 ? filteredCategories.length+1 : 5" id="category"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required>
                        <option v-for="category in filteredCategories" :value="category.id" :key="category.id">{{ category.name
                            }} {{ category.path ? ' | '+category.path : '' }}</option>
                    </select>
                </div>


                <div class="form-group">
                    <select name="level1_id" :size="levelLists.level1.length+1" v-model="selectedLevelIds.level1" class="form-control">
                        <option v-for="category in levelLists.level1" :value="category.id" :key="category.id">{{ category.name }}</option>
                    </select>
                </div>

                <div class="form-group" v-if="levelLists.level2.length>0">
                    <select name="level2_id" :size="levelLists.level2.length+1" v-model="selectedLevelIds.level2" class="form-control">
                        <option v-for="category in levelLists.level2" :value="category.id" :key="category.id">{{ category.name }}</option>
                    </select>
                </div>

                <div class="form-group" v-if="levelLists.level3.length>0">
                    <select name="level3_id" :size="levelLists.level3.length+1" v-model="selectedLevelIds.level3" class="form-control">
                        <option v-for="category in levelLists.level3" :value="category.id" :key="category.id">{{ category.name }}</option>
                    </select>
                </div>

                <div class="form-group" v-if="levelLists.level4.length>0">
                    <select name="level4_id" :size="levelLists.level4.length+1" v-model="selectedLevelIds.level4" class="form-control">
                        <option v-for="category in levelLists.level4" :value="category.id" :key="category.id">{{ category.name }}</option>
                    </select>
                </div>

                <div class="form-group" v-if="levelLists.level5.length>0">
                    <select name="level5_id" :size="levelLists.level5.length+1" v-model="selectedLevelIds.level5" class="form-control">
                        <option v-for="category in levelLists.level5" :value="category.id" :key="category.id">{{ category.name }}</option>
                    </select>
                </div>
                <div class="form-group" v-if="selectedCategory">
                    <button :disabled="!form.category_id" type="button"
                        :class="{'bg-blue-500 hover:bg-blue-700 text-white': true, 'opacity-50 cursor-not-allowed': !form.category_id}"
                        class="font-bold py-2 px-4 rounded ml-2" @click="categoryConfirmed">
                        Confirm Category
                    </button>
                </div>
            </div>

            <!-- form base on the selected category -->
            <!--  <div v-if="form.category_id != null" class="grid grid-cols-1 w-full"> -->
            <div v-show="!showCategorySelection" class="grid grid-cols-1 w-full mx-auto min-w-md">
                <div class="mb-6">
                    <label for="category"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Category</label>
                    <p @click="changeCategory" v-text="selectedCategory.path" class="shadow-sm bg-gray-50 
                    border border-gray-300 text-gray-900
                    text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
                    block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600
                    dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                    dark:focus:border-blue-500 dark:shadow-sm-light">
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
                    <input v-model="form.title" type="text" id="title"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required>
                </div>
                <div class="mb-6">
                    <label for="description"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Description</label>
                    <p v-if="errors.description" class="text-red-500 text-xs italic" v-text="errors.description[0]"></p>
                    <div class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        <div ref="descriptionEditorRef" style="min-height:300px;">
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="condition"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Condition</label>
                    <p v-if="errors.condition" class="text-red-500 text-xs italic" v-text="errors.condition[0]"></p>
                    <select v-model="form.condition" id="condition"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required>
                        <option value="new">New</option>
                        <option value="used_like_new">Used Like New</option>
                        <option value="used">Used</option>
                        <option value="refurbished">Refurbished</option>
                        <option value="damaged">Damaged</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="selling_format" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Selling
                        Format</label>
                    <p v-if="errors.selling_format" class="text-red-500 text-xs italic" v-text="errors.selling_format[0]"></p>
                    <select v-model="form.selling_format" id="selling_format"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                        required>
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
                        <select v-model="form.duration" id="duration"
                            class="mr-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                            <option value="1">1 day</option>
                            <option v-for="index in 59" :key="index" :value="index+1">{{ index+1 }} days</option>
                        </select>

                        <label for="price" class="mr-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            <p>Price<span class="text-red-500">*</span></p>
                        </label>
                        <p v-if="errors.price" class="text-red-500 text-xs italic" v-text="errors.price[0]"></p>
                        <input v-model="form.price" type="number" id="price"
                            class="mr-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required>

                        <label for="quantity"
                            class="mr-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Quantity</label>
                        <p v-if="errors.quantity" class="text-red-500 text-xs italic" v-text="errors.quantity[0]"></p>
                        <input v-model="form.quantity" type="number" id="price"
                            class="mr-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required>
                    </div>
                </div>
                <div class="mb-6 border border-green-400 p-6" v-if="form.selling_format == 'buy_now'">
                    <p class="mb-6 font-bold font-serif">Buy Now</p>
                    <div class="" id="buy-now-form">
                        <label for="duration" class="mb-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            <p>Duration</p>
                        </label>
                        <p v-if="errors.duration" class="text-red-500 text-xs italic" v-text="errors.duration[0]"></p>
                        <select v-model="form.duration" id="duration"
                            class="mb-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                            <option value="1">1 day</option>
                            <option v-for="index in 59" :key="index" :value="index+1">{{ index+1 }} days</option>
                        </select>

                        <label for="price" class="mb-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            <p>Price<span class="text-red-500">*</span></p>
                        </label>
                        <p v-if="errors.price" class="text-red-500 text-xs italic" v-text="errors.price[0]"></p>
                        <input v-model="form.price" type="number" id="price"
                            class="mb-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required>

                        <label for="tax" class="mb-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            <p>Tax (<span class="text-xsm text-orange-600">Price entered should be inclusive of Tax</span>)</p>
                        </label>
                        <p v-if="errors.tax" class="text-red-500 text-xs italic" v-text="errors.tax[0]"></p>
                        <select v-model="form.tax" id="tax"
                            class="mb-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                            <option value="" selected>Not Selected</option>
                            <option value="GST_6%" selected>GST 6%</option>
                        </select>

                        <label for="quantity"
                            class="mb-3 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Quantity</label>
                        <p v-if="errors.quantity" class="text-red-500 text-xs italic" v-text="errors.quantity[0]"></p>
                        <input v-model="form.quantity" type="number" id="price"
                            class="mb-6 shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required>
                    </div>
                </div>

                <!-- add photos -->
                <div class="mb-6">
                    <label for="photos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Photos</label>
                    <p v-if="errors.photos" class="text-red-500 text-xs italic" v-text="errors.photos[0]"></p>
                    <!-- <progress id="photo-upload-progress" :value="uploadProgress" max="100" class="w-full"> {{ uploadProgress }}% </progress> -->
                    <div class="mb-6 border border-green-400 p-6">
                        <div class="flex flex-wrap items-center" id="upload-photos">
                            <!-- put image placeholder here -->
                            <input type="file" @change="onFileChange($event,1)" ref="photo1" style="display: none">
                            <div
                                class="mr-6 flex flex-col items-center justify-center w-40 h-40 bg-gray-100 border-2 border-dashed border-gray-300 rounded-lg">
                                <div @click="photo1.value = null; photo1.click()"
                                    class="flex flex-col items-center justify-center" v-if="!images[1].url">
                                    <svg class="w-32 h-32 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v28a2 2 0 002 2h24a2 2 0 002-2V8a2 2 0 00-2-2H14a2 2 0 00-2 2zm0 0v6h24V8H12z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex flex-col items-center justify-center" v-if="images[1].url">
                                    <div class="w-full">
                                        <button @click="deleteImage(1)"
                                            class="relative top-0 right-0 z-10 p-1 bg-red-500 rounded-full float-right">
                                            <svg class="w-4 h-4 text-white" stroke="currentColor" fill="none"
                                                viewBox="0 0 24 24" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <img @click="photo1.value = null; photo1.click()" :src="images[1].url"
                                        class="w-32 h-32 text-gray-400">
                                </div>
                            </div>
                            <input type="file" @change="onFileChange($event,2)" ref="photo2" style="display: none">
                            <div
                                class="mr-6 flex flex-col items-center justify-center w-40 h-40 bg-gray-100 border-2 border-dashed border-gray-300 rounded-lg">
                                <div @click="photo2.value = null; photo2.click()"
                                    class="flex flex-col items-center justify-center" v-if="!images[2].url">
                                    <svg class="w-32 h-32 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v28a2 2 0 002 2h24a2 2 0 002-2V8a2 2 0 00-2-2H14a2 2 0 00-2 2zm0 0v6h24V8H12z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex flex-col items-center justify-center" v-if="images[2].url">
                                    <div class="w-full">
                                        <button @click="deleteImage(2)"
                                            class="relative top-0 right-0 z-10 p-1 bg-red-500 rounded-full float-right">
                                            <svg class="w-4 h-4 text-white" stroke="currentColor" fill="none"
                                                viewBox="0 0 24 24" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <img @click="photo2.value = null; photo2.click()" :src="images[2].url"
                                        class="w-32 h-32 text-gray-400">
                                </div>
                            </div>
                            <input type="file" @change="onFileChange($event,3)" ref="photo3" style="display: none">
                            <div
                                class="mr-6 flex flex-col items-center justify-center w-40 h-40 bg-gray-100 border-2 border-dashed border-gray-300 rounded-lg">
                                <div @click="photo3.value = null; photo3.click()"
                                    class="flex flex-col items-center justify-center" v-if="!images[3].url">
                                    <svg class="w-32 h-32 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v28a2 2 0 002 2h24a2 2 0 002-2V8a2 2 0 00-2-2H14a2 2 0 00-2 2zm0 0v6h24V8H12z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex flex-col items-center justify-center" v-if="images[3].url">
                                    <div class="w-full">
                                        <button @click="deleteImage(3)"
                                            class="relative top-0 right-0 z-10 p-1 bg-red-500 rounded-full float-right">
                                            <svg class="w-4 h-4 text-white" stroke="currentColor" fill="none"
                                                viewBox="0 0 24 24" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <img @click="photo3.value = null; photo3.click()" :src="images[3].url"
                                        class="w-32 h-32 text-gray-400">
                                </div>
                            </div>
                            <input type="file" @change="onFileChange($event,4)" ref="photo4" style="display: none">
                            <div
                                class="mr-6 flex flex-col items-center justify-center w-40 h-40 bg-gray-100 border-2 border-dashed border-gray-300 rounded-lg">
                                <div @click="photo4.value = null; photo4.click()"
                                    class="flex flex-col items-center justify-center" v-if="!images[4].url">
                                    <svg class="w-32 h-32 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v28a2 2 0 002 2h24a2 2 0 002-2V8a2 2 0 00-2-2H14a2 2 0 00-2 2zm0 0v6h24V8H12z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex flex-col items-center justify-center" v-if="images[4].url">
                                    <div class="w-full">
                                        <button @click="deleteImage(2)"
                                            class="relative top-0 right-0 z-10 p-1 bg-red-500 rounded-full float-right">
                                            <svg class="w-4 h-4 text-white" stroke="currentColor" fill="none"
                                                viewBox="0 0 24 24" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <img @click="photo4.value = null; photo4.click()" :src="images[4].url"
                                        class="w-32 h-32 text-gray-400">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- add locations -->
                <div class="mb-6">
                    <label for="location"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Location</label>
                    <p v-if="errors.locations" class="text-red-500 text-xs italic" v-text="errors.locations[0]"></p>
                    <label for="selected-locations"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Selected Locations</label>
                    <div class="flex flex-wrap my-2">
                        <div v-for="location in selectedLocations" :key="location.id"
                            class="flex items-center justify-center px-2 py-1 m-1 text-xs font-medium leading-5 text-blue-800 bg-blue-100 rounded-full dark:bg-blue-800 dark:text-blue-100">
                            <span class="mr-2">{{ location.name }}</span>
                            <button @click="removeLocation(location.id)" type="button"
                                class="bg-red-500 inline-flex items-center justify-center w-4 h-4 transition duration-150 ease-in-out rounded-full focus:outline-none focus:shadow-outline">
                                <svg class="w-3 h-3 text-white" stroke="currentColor" fill="none" viewBox="0 0 24 24"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="w-72">
                        <input v-model="locationSearch" type="text" id="locationSearch"
                            placeholder="Type name of the island,city to search"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            required>
                        <select v-if="filteredLocations.length>0" name="selectedLocation"
                            :size="filteredLocations.length<9?filteredLocations.length+1 : 10" v-model="selectedLocationId"
                            class="form-control w-full">
                            <option v-for="location in filteredLocations" :value="location.id" :key="location.id">{{ location.name }}</option>
                        </select>
                    </div>
                </div>

                <!-- add product attributes -->


                <button @click="submitForm"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
            </div>
        </div>
    </div>
</template>


<style lang="scss" scoped>
.ql-container, .ql-editor {
    height: 300px;
    min-height: inherit;
    background-color: white;
}
</style>
