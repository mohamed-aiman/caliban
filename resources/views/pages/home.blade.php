<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    {{-- defualt --}}
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}

    {{-- added  maximum-scale=1 to disable auto zoom in input tag when focused on mobie  --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ config('app.name') }}</title>

    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="antialiased text-gray-800 dark:bg-black dark:text-gray-400">
        <div class="container px-8 py-5 lg:py-8 mx-auto xl:px-5 max-w-screen-lg">
            <nav>
                <div class="flex flex-wrap justify-between md:gap-10 md:flex-nowrap">
                    <div
                        class="flex-col items-center justify-start order-1 hidden w-full md:flex md:flex-row md:justify-end md:w-auto md:order-none md:flex-1">
                        <a class="px-5 py-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-blue-500"
                            href="/">Home</a><a
                            class="px-5 py-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-blue-500"
                            href="/about">About</a><a
                            class="px-5 py-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-blue-500"
                            href="/contact">Contact</a>
                    </div>
                    <div class="flex items-center justify-between w-full md:w-auto"><a class="w-28 dark:hidden"
                            href="/"><span
                                style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative"><span
                                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;padding-top:39.39393939393939%"></span>
                                    <img
                                    alt="Logo" sizes="(max-width: 640px) 100vw, 200px"
                                    {{-- srcset="https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w" --}}
                                    {{-- src="https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format" --}}
                                    decoding="async" data-nimg="responsive"
                                    style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;"><noscript><img
                                        alt="Logo" sizes="(max-width: 640px) 100vw, 200px"
                                        {{-- srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w" --}}
                                        {{-- src="https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format" --}}
                                        decoding="async" data-nimg="responsive"
                                        style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                                        loading="lazy" /></noscript></span></a><a class="hidden w-28 dark:block"
                            href="/"><span
                                style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative"><span
                                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;padding-top:39.39393939393939%"></span>
                                    <img
                                    alt="Logo" sizes="(max-width: 640px) 100vw, 200px"
                                    {{-- srcset="https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w" --}}
                                    {{-- src="https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format" --}}
                                    decoding="async" data-nimg="responsive"
                                    style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;"><noscript><img
                                        alt="Logo" sizes="(max-width: 640px) 100vw, 200px"
                                        {{-- srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w" --}}
                                        {{-- src="https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format" --}}
                                        decoding="async" data-nimg="responsive"
                                        style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                                        loading="lazy" /></noscript></span></a><button aria-label="Toggle Menu"
                            class="px-2 py-1 ml-auto text-gray-500 rounded-md md:hidden focus:text-blue-500 focus:outline-none dark:text-gray-300 "
                            id="headlessui-disclosure-button-:Rf6:" type="button" aria-expanded="false"><svg
                                class="w-6 h-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                                </path>
                            </svg></button></div>

                </div>
            </nav>
        </div>
        <div>
            <div class="container px-8 py-5 lg:py-8 mx-auto xl:px-5 max-w-screen-lg">


                {{-- top 2 --}}
                <div class="grid gap-10 lg:gap-10 md:grid-cols-2 ">
                    @foreach ($data['top_posts'] as $post)
                    <div class="cursor-pointer group">
                        <div
                            class="relative overflow-hidden transition-all bg-gray-100 rounded-md dark:bg-gray-800   hover:scale-105 aspect-video">
                            <a href="{{ route('posts.show', $post['slug']) }}">
                                <span>
                                    <img alt="Thumbnail" 
                                        sizes="80vw"
                                        src="{{ $post['image'] }}"
                                        decoding="async" 
                                        data-nimg="fill" 
                                        class="transition-all object-cover w-full object-center h-64"
                                        >
                                </span>
                            </a>
                        </div>
                        <div class="flex gap-3">
                            @foreach ($post['tags'] as $tag)
                            <a href="/tags/{{ $tag }}">
                                <span class="inline-block mt-5 text-xs font-medium tracking-wider uppercase  text-blue-600">{{ $tag }}</span>
                            </a>
                            @endforeach
                        </div>
                        <h2 class="mt-2 text-lg font-semibold tracking-normal text-brand-primary dark:text-white">
                            <span
                                class=" bg-gradient-to-r from-green-200 to-green-100 dark:from-purple-800 
                                dark:to-purple-900 bg-[length:0px_10px] bg-left-bottom bg-no-repeat 
                                transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">
                                {{ $post['title']}}
                            </span>
                        </h2>
                        <div class="hidden">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 line-clamp-3">
                                <a href="{{ route('posts.show', $post['slug']) }}">
                                    {{ $post['body']}}
                                </a>
                            </p>
                        </div>
                        <div class="flex items-center mt-3 space-x-3 text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-3">
                                <div class="relative flex-shrink-0 w-5 h-5">
                                    <span 
                                        style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:absolute;top:0;left:0;bottom:0;right:0"><img
                                        alt="{{ $post['author_name'] }}"
                                        src="{{ $post['author_image'] }}
                                        decoding="async" data-nimg="fill" class="rounded-full"
                                        style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover;"
                                        sizes="30px"
                                        srcset="{{ $post['author_srcset'] }}">
                                        <noscript>
                                            <img
                                            alt="{{ $post['author_name'] }}" sizes="100vw"
                                            src="{{ $post['author_image'] }}"
                                            srcset="{{ $post['author_srcset'] }}"
                                            decoding="async" data-nimg="fill"
                                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover"
                                            class="rounded-full" loading="lazy" />
                                        </noscript>
                                    </span>
                                </div>
                                <span class="text-sm">{{ $post['author_name'] }}</span>
                            </div>
                            <span class="text-xs text-gray-300 dark:text-gray-600">•</span>
                            <time class="text-sm" datetime="2022-10-21T15:48:00.000Z">{{ $post['published_at'] }}</time>
                        </div>
                    </div>
                    @endforeach
                </div>



                {{-- remaining --}}
                <div class="grid gap-10 mt-10 lg:gap-10 md:grid-cols-2 xl:grid-cols-3 ">
                    @foreach ($data['posts'] as $post)
                    <div class="cursor-pointer group">
                        <div
                            class="relative overflow-hidden transition-all bg-gray-100 rounded-md dark:bg-gray-800   hover:scale-105 aspect-square">
                            <a href="{{ route('posts.show', $post['slug']) }}" class="w-full h-full">
                                <span>
                                    <img alt="Thumbnail" src="https://beast.local/storage/photo-4.webp"
                                        decoding="async" data-nimg="fill"
                                        class="transition-all object-cover-down h-48 w-full" 
                                        sizes="80vw">
                                    <noscript>
                                        <img alt="Thumbnail" sizes="100vw"
                                            srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/12301f301772ed723724302aef7c70c5c1c0151f-4500x8000.jpg?rect=0,1080,4500,5330&amp;w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/12301f301772ed723724302aef7c70c5c1c0151f-4500x8000.jpg?rect=0,1080,4500,5330&amp;w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/12301f301772ed723724302aef7c70c5c1c0151f-4500x8000.jpg?rect=0,1080,4500,5330&amp;w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/12301f301772ed723724302aef7c70c5c1c0151f-4500x8000.jpg?rect=0,1080,4500,5330&amp;w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/12301f301772ed723724302aef7c70c5c1c0151f-4500x8000.jpg?rect=0,1080,4500,5330&amp;w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/12301f301772ed723724302aef7c70c5c1c0151f-4500x8000.jpg?rect=0,1080,4500,5330&amp;w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/12301f301772ed723724302aef7c70c5c1c0151f-4500x8000.jpg?rect=0,1080,4500,5330&amp;w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://beast.local/storage/photo_1.jpeg 3840w"
                                            src="https://beast.local/storage/photo_1.jpeg" decoding="async"
                                            data-nimg="fill"
                                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover"
                                            class="transition-all" loading="lazy" />
                                    </noscript>
                                </span>
                            </a>
                        </div>
                        <div class="flex gap-3">
                            @foreach ($post['tags'] as $tag)
                            <a href="/tags/{{ $tag }}">
                                <span class="inline-block mt-5 text-xs font-medium tracking-wider uppercase  text-blue-600">{{ $tag }}</span>
                            </a>
                            @endforeach
                        </div>
                        <h2 class="mt-2 text-lg font-semibold tracking-normal text-brand-primary dark:text-white">
                            <span class=" bg-gradient-to-r from-green-200 to-green-100 dark:from-purple-800 dark:to-purple-900 
                            bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] 
                            group-hover:bg-[length:100%_10px]">
                            {{ $post['title'] }}
                            </span>
                        </h2>
                        <div class="hidden">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 line-clamp-3">
                                <a href="{{ route('posts.show', $post['slug']) }}">
                                    {{ $post['body'] }}
                                </a>
                            </p>
                        </div>
                        <div class="flex items-center mt-3 space-x-3 text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-3">
                                <div class="relative flex-shrink-0 w-5 h-5">
                                    <span
                                        style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:absolute;top:0;left:0;bottom:0;right:0">
                                        <img
                                            alt="{{ $post['author_name'] }}"
                                            src="{{ $post['author_image'] }}"
                                            decoding="async" 
                                            data-nimg="fill" 
                                            class="rounded-full"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover;"
                                            sizes="30px"
                                            srcset="{{ $post['srcset'] }}">
                                            <noscript>
                                                <img
                                                alt="{{ $post['author_name'] }}" 
                                                sizes="100vw"
                                                srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                                src="https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                                decoding="async" 
                                                data-nimg="fill"
                                                style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover"
                                                class="rounded-full" loading="lazy" />
                                            </noscript>
                                        </span>
                                    </div>
                                    <span class="text-sm">{{ $post['author_name'] }}</span>
                            </div>
                            <span class="text-xs text-gray-300 dark:text-gray-600">•</span>
                            <time class="text-sm" datetime="2022-10-21T06:05:00.000Z">{{ $post['published_at'] }}</time>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</body>

</html>
