@extends('layouts.dashboard')

@section('body')

<main class="mx-auto max-w-7xl sm:px-6 sm:pt-16 lg:px-8">
      <div class="mx-auto max-w-2xl lg:max-w-none">
        <!-- Product -->
        <div class="lg:grid lg:grid-cols-2 lg:items-start lg:gap-x-8">
          <!-- Image gallery -->
          <div class="flex flex-col-reverse">
            <!-- Image selector -->
            <div class="mx-auto mt-6 hidden w-full max-w-2xl sm:block lg:max-w-none">
              <div class="grid grid-cols-4 gap-6" aria-orientation="horizontal" role="tablist">
                
                  <button id="tabs-2-tab-1" class="relative flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-offset-4" x-data="Components.tab(0)" aria-controls="tabs-2-panel-1" role="tab" x-init="init()" @click="onClick" @keydown="onKeydown" @tab-select.window="onTabSelect" :tabindex="selected ? 0 : -1" :aria-selected="selected ? 'true' : 'false'" type="button" tabindex="0" aria-selected="true">
                    <span class="sr-only"> Angled view </span>
                    <span class="absolute inset-0 overflow-hidden rounded-md">
                      <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-product-01.jpg" alt="" class="h-full w-full object-cover object-center">
                    </span>
                    <span class="pointer-events-none absolute inset-0 rounded-md ring-2 ring-offset-2 ring-indigo-500" aria-hidden="true" x-state:on="Selected" x-state:off="Not Selected" :class="{ 'ring-indigo-500': selected, 'ring-transparent': !(selected) }"></span>
                  </button>
                
                  <button id="tabs-2-tab-2" class="relative flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-offset-4" x-data="Components.tab(0)" aria-controls="tabs-2-panel-2" role="tab" x-init="init()" @click="onClick" @keydown="onKeydown" @tab-select.window="onTabSelect" :tabindex="selected ? 0 : -1" :aria-selected="selected ? 'true' : 'false'" type="button" tabindex="-1" aria-selected="false">
                    <span class="sr-only"> Front view </span>
                    <span class="absolute inset-0 overflow-hidden rounded-md">
                      <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-product-02.jpg" alt="" class="h-full w-full object-cover object-center">
                    </span>
                    <span class="ring-transparent pointer-events-none absolute inset-0 rounded-md ring-2 ring-offset-2" aria-hidden="true" x-state:on="Selected" x-state:off="Not Selected" :class="{ 'ring-indigo-500': selected, 'ring-transparent': !(selected) }"></span>
                  </button>
                
                  <button id="tabs-2-tab-3" class="relative flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-offset-4" x-data="Components.tab(0)" aria-controls="tabs-2-panel-3" role="tab" x-init="init()" @click="onClick" @keydown="onKeydown" @tab-select.window="onTabSelect" :tabindex="selected ? 0 : -1" :aria-selected="selected ? 'true' : 'false'" type="button" tabindex="-1" aria-selected="false">
                    <span class="sr-only"> Back view </span>
                    <span class="absolute inset-0 overflow-hidden rounded-md">
                      <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-product-03.jpg" alt="" class="h-full w-full object-cover object-center">
                    </span>
                    <span class="ring-transparent pointer-events-none absolute inset-0 rounded-md ring-2 ring-offset-2" aria-hidden="true" x-state:on="Selected" x-state:off="Not Selected" :class="{ 'ring-indigo-500': selected, 'ring-transparent': !(selected) }"></span>
                  </button>
                
                  <button id="tabs-2-tab-4" class="relative flex h-24 cursor-pointer items-center justify-center rounded-md bg-white text-sm font-medium uppercase text-gray-900 hover:bg-gray-50 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-offset-4" x-data="Components.tab(0)" aria-controls="tabs-2-panel-4" role="tab" x-init="init()" @click="onClick" @keydown="onKeydown" @tab-select.window="onTabSelect" :tabindex="selected ? 0 : -1" :aria-selected="selected ? 'true' : 'false'" type="button" tabindex="-1" aria-selected="false">
                    <span class="sr-only"> Back angle open view </span>
                    <span class="absolute inset-0 overflow-hidden rounded-md">
                      <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-product-04.jpg" alt="" class="h-full w-full object-cover object-center">
                    </span>
                    <span class="ring-transparent pointer-events-none absolute inset-0 rounded-md ring-2 ring-offset-2" aria-hidden="true" x-state:on="Selected" x-state:off="Not Selected" :class="{ 'ring-indigo-500': selected, 'ring-transparent': !(selected) }"></span>
                  </button>
                
              </div>
            </div>

            <div class="aspect-w-1 aspect-h-1 w-full">
              
                <div id="tabs-2-panel-1" x-description="Tab panel, show/hide based on tab state." x-data="Components.tabPanel(0)" aria-labelledby="tabs-2-tab-1" x-init="init()" x-show="selected" @tab-select.window="onTabSelect" role="tabpanel" tabindex="0">
                  <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-product-01.jpg" alt="Angled front view with bag zipped and handles upright." class="h-full w-full object-cover object-center sm:rounded-lg">
                </div>
              
                <div id="tabs-2-panel-2" x-description="Tab panel, show/hide based on tab state." x-data="Components.tabPanel(0)" aria-labelledby="tabs-2-tab-2" x-init="init()" x-show="selected" @tab-select.window="onTabSelect" role="tabpanel" tabindex="0" style="display: none;">
                  <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-product-02.jpg" alt="Front view with bag zipped and handles upright." class="h-full w-full object-cover object-center sm:rounded-lg">
                </div>
              
                <div id="tabs-2-panel-3" x-description="Tab panel, show/hide based on tab state." x-data="Components.tabPanel(0)" aria-labelledby="tabs-2-tab-3" x-init="init()" x-show="selected" @tab-select.window="onTabSelect" role="tabpanel" tabindex="0" style="display: none;">
                  <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-product-03.jpg" alt="Back view with bag zipped and straps hanging down." class="h-full w-full object-cover object-center sm:rounded-lg">
                </div>
              
                <div id="tabs-2-panel-4" x-description="Tab panel, show/hide based on tab state." x-data="Components.tabPanel(0)" aria-labelledby="tabs-2-tab-4" x-init="init()" x-show="selected" @tab-select.window="onTabSelect" role="tabpanel" tabindex="0" style="display: none;">
                  <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-product-04.jpg" alt="Back angled view with bag open and handles to the side." class="h-full w-full object-cover object-center sm:rounded-lg">
                </div>
              
            </div>
          </div>

          <!-- Product info -->
          <div class="mt-10 px-4 sm:mt-16 sm:px-0 lg:mt-0">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $product->title }}</h1>

            <div class="mt-3">
              <h2 class="sr-only">Product information</h2>
              <p class="text-3xl tracking-tight text-gray-900">MVR {{ $product->price }}</p>
            </div>

            <!-- Reviews -->
            <div class="mt-3">
              <h3 class="sr-only">Reviews</h3>
              <div class="flex items-center">
                <div class="flex items-center">
                  
                    <svg class="h-5 w-5 flex-shrink-0 text-indigo-500" x-state:on="Active" x-state:off="Inactive" x-state-description="Active: &quot;text-indigo-500&quot;, Inactive: &quot;text-gray-300&quot;" x-description="Heroicon name: mini/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd"></path>
</svg>
                  
                    <svg class="h-5 w-5 flex-shrink-0 text-indigo-500" x-state-description="undefined: &quot;text-indigo-500&quot;, undefined: &quot;text-gray-300&quot;" x-description="Heroicon name: mini/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd"></path>
</svg>
                  
                    <svg class="h-5 w-5 flex-shrink-0 text-indigo-500" x-state-description="undefined: &quot;text-indigo-500&quot;, undefined: &quot;text-gray-300&quot;" x-description="Heroicon name: mini/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd"></path>
</svg>
                  
                    <svg class="h-5 w-5 flex-shrink-0 text-indigo-500" x-state-description="undefined: &quot;text-indigo-500&quot;, undefined: &quot;text-gray-300&quot;" x-description="Heroicon name: mini/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd"></path>
</svg>
                  
                    <svg class="h-5 w-5 flex-shrink-0 text-gray-300" x-state-description="undefined: &quot;text-indigo-500&quot;, undefined: &quot;text-gray-300&quot;" x-description="Heroicon name: mini/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
  <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401z" clip-rule="evenodd"></path>
</svg>
                  
                </div>
                <p class="sr-only">4 out of 5 stars</p>
              </div>
            </div>

            <div class="mt-6">
              <h3 class="sr-only">Description</h3>

                <div class="space-y-6 text-base text-gray-700">
                    <p>The Zip Tote Basket is the perfect midpoint between shopping tote and comfy backpack. With convertible straps, you can hand carry, should sling, or backpack this convenient and spacious bag. The zip top and durable canvas construction keeps your goods protected for all-day use.</p>
                    {{-- {!! $product->description !!} --}}
                </div>
            </div>

            <form class="mt-6">
              <!-- Colors -->
              <div>
                <h3 class="text-sm text-gray-600">Color</h3>

                <fieldset class="mt-2">
                  <legend class="sr-only"> Choose a color </legend>
                  <div class="flex items-center space-x-3">
                    
                      <label x-radio-group-option="" class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-700 ring-2" x-description="Active and Checked: &quot;ring ring-offset-1&quot;	Not Active and Checked: &quot;ring-2&quot;" :class="{ 'ring ring-offset-1': (active === 'Washed Black') &amp;&amp; (value === 'Washed Black'), 'undefined': !(active === 'Washed Black') || !(value === 'Washed Black'), 'ring-2': !(active === 'Washed Black') &amp;&amp; (value === 'Washed Black'), 'undefined': (active === 'Washed Black') || !(value === 'Washed Black') }">
                        <input type="radio" name="color-choice" value="Washed Black" class="sr-only" aria-labelledby="color-choice-0-label">
                        <span id="color-choice-0-label" class="sr-only"> Washed Black </span>
                        <span aria-hidden="true" class="h-8 w-8 bg-gray-700 border border-black border-opacity-10 rounded-full"></span>
                      </label>
                    
                      <label x-radio-group-option="" class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-400 undefined" x-description="Active and Checked: &quot;ring ring-offset-1&quot;	Not Active and Checked: &quot;ring-2&quot;" :class="{ 'ring ring-offset-1': (active === 'White') &amp;&amp; (value === 'White'), 'undefined': !(active === 'White') || !(value === 'White'), 'ring-2': !(active === 'White') &amp;&amp; (value === 'White'), 'undefined': (active === 'White') || !(value === 'White') }">
                        <input type="radio" name="color-choice" value="White" class="sr-only" aria-labelledby="color-choice-1-label">
                        <span id="color-choice-1-label" class="sr-only"> White </span>
                        <span aria-hidden="true" class="h-8 w-8 bg-white border border-black border-opacity-10 rounded-full"></span>
                      </label>
                    
                      <label x-radio-group-option="" class="-m-0.5 relative p-0.5 rounded-full flex items-center justify-center cursor-pointer focus:outline-none ring-gray-500 undefined" x-description="Active and Checked: &quot;ring ring-offset-1&quot;	Not Active and Checked: &quot;ring-2&quot;" :class="{ 'ring ring-offset-1': (active === 'Washed Gray') &amp;&amp; (value === 'Washed Gray'), 'undefined': !(active === 'Washed Gray') || !(value === 'Washed Gray'), 'ring-2': !(active === 'Washed Gray') &amp;&amp; (value === 'Washed Gray'), 'undefined': (active === 'Washed Gray') || !(value === 'Washed Gray') }">
                        <input type="radio" name="color-choice" value="Washed Gray" class="sr-only" aria-labelledby="color-choice-2-label">
                        <span id="color-choice-2-label" class="sr-only"> Washed Gray </span>
                        <span aria-hidden="true" class="h-8 w-8 bg-gray-500 border border-black border-opacity-10 rounded-full"></span>
                      </label>
                    
                  </div>
                </fieldset>
              </div>

              <div class="mt-10 flex">
                <button type="submit" class="flex max-w-xs flex-1 items-center justify-center rounded-md border border-transparent bg-indigo-600 py-3 px-8 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50 sm:w-full">Add to bag</button>

                <button type="button" class="ml-4 flex items-center justify-center rounded-md py-3 px-3 text-gray-400 hover:bg-gray-100 hover:text-gray-500">
                    <svg class="h-6 w-6 flex-shrink-0" x-description="Heroicon name: outline/heart" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"></path>
                    </svg>
                  <span class="sr-only">Add to favorites</span>
                </button>
              </div>
            </form>

            <section aria-labelledby="details-heading" class="mt-12">
              <h2 id="details-heading" class="sr-only">Additional details</h2>
              <div class="divide-y divide-gray-200 border-t">
               {!! $product->description !!}
              </div>
            </section>
          </div>
        </div>

        <section aria-labelledby="related-heading" class="mt-10 border-t border-gray-200 py-16 px-4 sm:px-0">
          <h2 id="related-heading" class="text-xl font-bold text-gray-900">Customers also bought</h2>

          <div class="mt-8 grid grid-cols-1 gap-y-12 sm:grid-cols-2 sm:gap-x-6 lg:grid-cols-4 xl:gap-x-8">
            
              <div>
                <div class="relative">
                  <div class="relative h-72 w-full overflow-hidden rounded-lg">
                    <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-related-product-01.jpg" alt="Front of zip tote bag with white canvas, black canvas straps and handle, and black zipper pulls." class="h-full w-full object-cover object-center">
                  </div>
                  <div class="relative mt-4">
                    <h3 class="text-sm font-medium text-gray-900">Zip Tote Basket</h3>
                    <p class="mt-1 text-sm text-gray-500">White and black</p>
                  </div>
                  <div class="absolute inset-x-0 top-0 flex h-72 items-end justify-end overflow-hidden rounded-lg p-4">
                    <div aria-hidden="true" class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                    <p class="relative text-lg font-semibold text-white">$140</p>
                  </div>
                </div>
                <div class="mt-6">
                  <a href="#" class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-200">Add to bag<span class="sr-only">, Zip Tote Basket</span></a>
                </div>
              </div>
            
              <div>
                <div class="relative">
                  <div class="relative h-72 w-full overflow-hidden rounded-lg">
                    <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-related-product-02.jpg" alt="Front of zip tote bag with white canvas, blue canvas straps and handle, and front zipper pocket." class="h-full w-full object-cover object-center">
                  </div>
                  <div class="relative mt-4">
                    <h3 class="text-sm font-medium text-gray-900">Zip High Wall Tote</h3>
                    <p class="mt-1 text-sm text-gray-500">White and blue</p>
                  </div>
                  <div class="absolute inset-x-0 top-0 flex h-72 items-end justify-end overflow-hidden rounded-lg p-4">
                    <div aria-hidden="true" class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                    <p class="relative text-lg font-semibold text-white">$150</p>
                  </div>
                </div>
                <div class="mt-6">
                  <a href="#" class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-200">Add to bag<span class="sr-only">, Zip High Wall Tote</span></a>
                </div>
              </div>
            
              <div>
                <div class="relative">
                  <div class="relative h-72 w-full overflow-hidden rounded-lg">
                    <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-related-product-03.jpg" alt="Front of tote with monochrome natural canvas body, straps, roll top, and handles." class="h-full w-full object-cover object-center">
                  </div>
                  <div class="relative mt-4">
                    <h3 class="text-sm font-medium text-gray-900">Halfsize Tote</h3>
                    <p class="mt-1 text-sm text-gray-500">Clay</p>
                  </div>
                  <div class="absolute inset-x-0 top-0 flex h-72 items-end justify-end overflow-hidden rounded-lg p-4">
                    <div aria-hidden="true" class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                    <p class="relative text-lg font-semibold text-white">$210</p>
                  </div>
                </div>
                <div class="mt-6">
                  <a href="#" class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-200">Add to bag<span class="sr-only">, Halfsize Tote</span></a>
                </div>
              </div>
            
              <div>
                <div class="relative">
                  <div class="relative h-72 w-full overflow-hidden rounded-lg">
                    <img src="https://tailwindui.com/img/ecommerce-images/product-page-03-related-product-04.jpg" alt="Front of zip tote bag with black canvas, black handles, and orange drawstring top." class="h-full w-full object-cover object-center">
                  </div>
                  <div class="relative mt-4">
                    <h3 class="text-sm font-medium text-gray-900">High Wall Tote</h3>
                    <p class="mt-1 text-sm text-gray-500">Black and orange</p>
                  </div>
                  <div class="absolute inset-x-0 top-0 flex h-72 items-end justify-end overflow-hidden rounded-lg p-4">
                    <div aria-hidden="true" class="absolute inset-x-0 bottom-0 h-36 bg-gradient-to-t from-black opacity-50"></div>
                    <p class="relative text-lg font-semibold text-white">$210</p>
                  </div>
                </div>
                <div class="mt-6">
                  <a href="#" class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-200">Add to bag<span class="sr-only">, High Wall Tote</span></a>
                </div>
              </div>
            
          </div>
        </section>
      </div>
    </main>

@endsection
