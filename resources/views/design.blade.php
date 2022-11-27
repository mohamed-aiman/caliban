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
                                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;padding-top:39.39393939393939%"></span><img
                                    alt="Logo" sizes="(max-width: 640px) 100vw, 200px"
                                    srcset="https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                    src="https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                    decoding="async" data-nimg="responsive"
                                    style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;"><noscript><img
                                        alt="Logo" sizes="(max-width: 640px) 100vw, 200px"
                                        srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                        src="https://cdn.sanity.io/images/e4rzjq6v/production/7a514084b883d518c85304cd91de4ab6e33f0f86-132x52.svg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                        decoding="async" data-nimg="responsive"
                                        style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%"
                                        loading="lazy" /></noscript></span></a><a class="hidden w-28 dark:block"
                            href="/"><span
                                style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:relative"><span
                                    style="box-sizing:border-box;display:block;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;padding-top:39.39393939393939%"></span><img
                                    alt="Logo" sizes="(max-width: 640px) 100vw, 200px"
                                    srcset="https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                    src="https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                    decoding="async" data-nimg="responsive"
                                    style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;"><noscript><img
                                        alt="Logo" sizes="(max-width: 640px) 100vw, 200px"
                                        srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                        src="https://cdn.sanity.io/images/e4rzjq6v/production/6828856f039d153c9e9989e9d34884e9745283f7-132x52.svg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
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
                <div class="grid gap-10 lg:gap-10 md:grid-cols-2 ">
                    <div class="cursor-pointer group">
                        <div
                            class="relative overflow-hidden transition-all bg-gray-100 rounded-md dark:bg-gray-800   hover:scale-105 aspect-video">
                            <a href="/post/architectural-engineering-wonders-of-the-modern-era-for-your-inspiration">
                                <span>
                                    <img alt="Thumbnail" sizes="80vw"
                                        src="https://cdn.sanity.io/images/e4rzjq6v/production/05951a0ec1a6ffc54f615ab160649e92fea982d0-800x764.png?rect=0,0,800,468&amp;w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                        decoding="async" data-nimg="fill" 
                                        class="transition-all object-cover w-full object-center h-64"
                                        >
                                </span>
                            </a>
                        </div>
                        <div class="flex gap-3"><a href="/index#"><span
                                    class="inline-block mt-5 text-xs font-medium tracking-wider uppercase  text-blue-600">Technology</span></a>
                        </div>
                        <h2 class="mt-2 text-lg font-semibold tracking-normal text-brand-primary dark:text-white"><span
                                class=" bg-gradient-to-r from-green-200 to-green-100 dark:from-purple-800 dark:to-purple-900 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">Architectural
                                Engineering Wonders of the modern era for your Inspiration</span></h2>
                        <div class="hidden">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 line-clamp-3"><a
                                    href="/post/architectural-engineering-wonders-of-the-modern-era-for-your-inspiration">Reinvention
                                    often comes in spurts, after a long period of silence. Just as modern architecture
                                    recently enjoyed a comeback, brand architecture, a field with well-established
                                    principles for decades</a></p>
                        </div>
                        <div class="flex items-center mt-3 space-x-3 text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-3">
                                <div class="relative flex-shrink-0 w-5 h-5"><span
                                        style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:absolute;top:0;left:0;bottom:0;right:0"><img
                                            alt="Mario Sanchez"
                                            src="https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                            decoding="async" data-nimg="fill" class="rounded-full"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover;"
                                            sizes="30px"
                                            srcset="https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=16&amp;q=75&amp;fit=clip&amp;auto=format 16w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=32&amp;q=75&amp;fit=clip&amp;auto=format 32w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=48&amp;q=75&amp;fit=clip&amp;auto=format 48w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=64&amp;q=75&amp;fit=clip&amp;auto=format 64w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=96&amp;q=75&amp;fit=clip&amp;auto=format 96w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=128&amp;q=75&amp;fit=clip&amp;auto=format 128w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=256&amp;q=75&amp;fit=clip&amp;auto=format 256w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=384&amp;q=75&amp;fit=clip&amp;auto=format 384w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"><noscript><img
                                                alt="Mario Sanchez" sizes="100vw"
                                                srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                                src="https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                                decoding="async" data-nimg="fill"
                                                style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover"
                                                class="rounded-full" loading="lazy" /></noscript></span></div><span
                                    class="text-sm">Mario Sanchez</span>
                            </div><span class="text-xs text-gray-300 dark:text-gray-600">•</span><time class="text-sm"
                                datetime="2022-10-21T15:48:00.000Z">October 21, 2022</time>
                        </div>
                    </div>
                    <div class="cursor-pointer group">
                        <div
                            class="relative overflow-hidden transition-all bg-gray-100 rounded-md dark:bg-gray-800   hover:scale-105 aspect-video">
                            <a href="/post/5-effective-brain-recharging-activities-no-one-is-talking-about"><span><img
                                        alt="Graphics" sizes="80vw"
                                        src="https://cdn.sanity.io/images/e4rzjq6v/production/2fda477a7e32f813abb9a8ef425939e6a91c7973-987x1481.png?rect=0,279,987,607&amp;w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                        decoding="async" data-nimg="fill"
                                        class="transition-all object-cover w-full object-center h-64"
                                        >
                                        <noscript>
                                            <img
                                            alt="Graphics" sizes="80vw"
                                            srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/2fda477a7e32f813abb9a8ef425939e6a91c7973-987x1481.png?rect=0,279,987,607&amp;w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/2fda477a7e32f813abb9a8ef425939e6a91c7973-987x1481.png?rect=0,279,987,607&amp;w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/2fda477a7e32f813abb9a8ef425939e6a91c7973-987x1481.png?rect=0,279,987,607&amp;w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/2fda477a7e32f813abb9a8ef425939e6a91c7973-987x1481.png?rect=0,279,987,607&amp;w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/2fda477a7e32f813abb9a8ef425939e6a91c7973-987x1481.png?rect=0,279,987,607&amp;w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/2fda477a7e32f813abb9a8ef425939e6a91c7973-987x1481.png?rect=0,279,987,607&amp;w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/2fda477a7e32f813abb9a8ef425939e6a91c7973-987x1481.png?rect=0,279,987,607&amp;w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/2fda477a7e32f813abb9a8ef425939e6a91c7973-987x1481.png?rect=0,279,987,607&amp;w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                            src="https://cdn.sanity.io/images/e4rzjq6v/production/2fda477a7e32f813abb9a8ef425939e6a91c7973-987x1481.png?rect=0,279,987,607&amp;w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                            decoding="async" data-nimg="fill"
                                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover"
                                            class="transition-all" loading="lazy" /></noscript></span></a>
                        </div>
                        <div class="flex gap-3"><a href="/index#"><span
                                    class="inline-block mt-5 text-xs font-medium tracking-wider uppercase  text-purple-600">Lifestyle</span></a>
                        </div>
                        <h2 class="mt-2 text-lg font-semibold tracking-normal text-brand-primary dark:text-white"><span
                                class=" bg-gradient-to-r from-green-200 to-green-100 dark:from-purple-800 dark:to-purple-900 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">5
                                Effective Brain Recharging Activities No One is Talking About</span></h2>
                        <div class="hidden">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 line-clamp-3"><a
                                    href="/post/5-effective-brain-recharging-activities-no-one-is-talking-about">No
                                    wonder mental health issues are at an all-time high. As my friend John called it,
                                    we’re already in the third world war — and the battlegrounds are our heads.</a></p>
                        </div>
                        <div class="flex items-center mt-3 space-x-3 text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-3">
                                <div class="relative flex-shrink-0 w-5 h-5"><span
                                        style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:absolute;top:0;left:0;bottom:0;right:0"><img
                                            alt="Joshua Wood"
                                            src="https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                            decoding="async" data-nimg="fill" class="rounded-full"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover;"
                                            sizes="30px"
                                            srcset="https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=16&amp;q=75&amp;fit=clip&amp;auto=format 16w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=32&amp;q=75&amp;fit=clip&amp;auto=format 32w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=48&amp;q=75&amp;fit=clip&amp;auto=format 48w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=64&amp;q=75&amp;fit=clip&amp;auto=format 64w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=96&amp;q=75&amp;fit=clip&amp;auto=format 96w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=128&amp;q=75&amp;fit=clip&amp;auto=format 128w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=256&amp;q=75&amp;fit=clip&amp;auto=format 256w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=384&amp;q=75&amp;fit=clip&amp;auto=format 384w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"><noscript><img
                                                alt="Joshua Wood" sizes="100vw"
                                                srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                                src="https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                                decoding="async" data-nimg="fill"
                                                style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover"
                                                class="rounded-full" loading="lazy" /></noscript></span></div><span
                                    class="text-sm">Joshua Wood</span>
                            </div><span class="text-xs text-gray-300 dark:text-gray-600">•</span><time class="text-sm"
                                datetime="2022-10-21T10:50:00.000Z">October 21, 2022</time>
                        </div>
                    </div>
                </div>
                <div class="grid gap-10 mt-10 lg:gap-10 md:grid-cols-2 xl:grid-cols-3 ">
                    <div class="cursor-pointer group">
                        <div
                            class="relative overflow-hidden transition-all bg-gray-100 rounded-md dark:bg-gray-800   hover:scale-105 aspect-square">
                            <a href="/post/14-architectural-design-ideas-for-spacious-interior" class="w-full h-full">
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
                        <div class="flex gap-3"><a href="/index#"><span
                                    class="inline-block mt-5 text-xs font-medium tracking-wider uppercase  text-blue-600">Design</span></a><a
                                href="/index#"><span
                                    class="inline-block mt-5 text-xs font-medium tracking-wider uppercase  text-purple-600">Lifestyle</span></a>
                        </div>
                        <h2 class="mt-2 text-lg font-semibold tracking-normal text-brand-primary dark:text-white"><span
                                class=" bg-gradient-to-r from-green-200 to-green-100 dark:from-purple-800 dark:to-purple-900 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">14
                                Asssrchitectural Design Ideas for a Spacious Interior</span></h2>
                        <div class="hidden">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 line-clamp-3"><a
                                    href="/post/14-architectural-design-ideas-for-spacious-interior">It is a cliche
                                    philosophical question, but it touches on something fundamental about how humans
                                    relate to the world around them. </a></p>
                        </div>
                        <div class="flex items-center mt-3 space-x-3 text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-3">
                                <div class="relative flex-shrink-0 w-5 h-5">
                                    <span
                                        style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:absolute;top:0;left:0;bottom:0;right:0"><img
                                            alt="Mario Sanchez"
                                            src="https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                            decoding="async" data-nimg="fill" class="rounded-full"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover;"
                                            sizes="30px"
                                            srcset="https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=16&amp;q=75&amp;fit=clip&amp;auto=format 16w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=32&amp;q=75&amp;fit=clip&amp;auto=format 32w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=48&amp;q=75&amp;fit=clip&amp;auto=format 48w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=64&amp;q=75&amp;fit=clip&amp;auto=format 64w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=96&amp;q=75&amp;fit=clip&amp;auto=format 96w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=128&amp;q=75&amp;fit=clip&amp;auto=format 128w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=256&amp;q=75&amp;fit=clip&amp;auto=format 256w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=384&amp;q=75&amp;fit=clip&amp;auto=format 384w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"><noscript><img
                                                alt="Mario Sanchez" sizes="100vw"
                                                srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                                src="https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                                decoding="async" data-nimg="fill"
                                                style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover"
                                                class="rounded-full" loading="lazy" /></noscript></span></div><span
                                    class="text-sm">Mario Sanchez</span>
                            </div><span class="text-xs text-gray-300 dark:text-gray-600">•</span><time class="text-sm"
                                datetime="2022-10-21T06:05:00.000Z">October 21, 2022</time>
                        </div>
                    </div>
                    <div class="cursor-pointer group">
                        <div
                            class="relative overflow-hidden transition-all bg-gray-100 rounded-md dark:bg-gray-800   hover:scale-105 aspect-square">
                            <a href="/post/14-architectural-design-ideas-for-spacious-interior" class="w-full h-full">
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
                        <div class="flex gap-3"><a href="/index#"><span
                                    class="inline-block mt-5 text-xs font-medium tracking-wider uppercase  text-purple-600">Lifestyle</span></a><a
                                href="/index#"><span
                                    class="inline-block mt-5 text-xs font-medium tracking-wider uppercase  text-emerald-700">Personal
                                    Growth</span></a></div>
                        <h2 class="mt-2 text-lg font-semibold tracking-normal text-brand-primary dark:text-white"><span
                                class=" bg-gradient-to-r from-green-200 to-green-100 dark:from-purple-800 dark:to-purple-900 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">Every
                                Next Level of Your Life Will Demand a Different You</span></h2>
                        <div class="hidden">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 line-clamp-3"><a
                                    href="/post/every-next-level-of-your-life-will-demand-a-different-you">That was so
                                    fun! I’ve got a new addiction! my athlete friend exclaimed, tired but happy in the
                                    car on the way home. “Let’s do it again tomorrow.”</a></p>
                        </div>
                        <div class="flex items-center mt-3 space-x-3 text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-3">
                                <div class="relative flex-shrink-0 w-5 h-5"><span
                                        style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:absolute;top:0;left:0;bottom:0;right:0"><img
                                            alt="Mario Sanchez"
                                            src="https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                            decoding="async" data-nimg="fill" class="rounded-full"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover;"
                                            sizes="30px"
                                            srcset="https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=16&amp;q=75&amp;fit=clip&amp;auto=format 16w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=32&amp;q=75&amp;fit=clip&amp;auto=format 32w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=48&amp;q=75&amp;fit=clip&amp;auto=format 48w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=64&amp;q=75&amp;fit=clip&amp;auto=format 64w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=96&amp;q=75&amp;fit=clip&amp;auto=format 96w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=128&amp;q=75&amp;fit=clip&amp;auto=format 128w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=256&amp;q=75&amp;fit=clip&amp;auto=format 256w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=384&amp;q=75&amp;fit=clip&amp;auto=format 384w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"><noscript><img
                                                alt="Mario Sanchez" sizes="100vw"
                                                srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                                src="https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                                decoding="async" data-nimg="fill"
                                                style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover"
                                                class="rounded-full" loading="lazy" /></noscript></span></div><span
                                    class="text-sm">Mario Sanchez</span>
                            </div><span class="text-xs text-gray-300 dark:text-gray-600">•</span><time class="text-sm"
                                datetime="2022-10-20T12:28:00.000Z">October 20, 2022</time>
                        </div>
                    </div>
                    <div class="cursor-pointer group">
                        <div
                            class="relative overflow-hidden transition-all bg-gray-100 rounded-md dark:bg-gray-800   hover:scale-105 aspect-square">
                            <a href="/post/14-architectural-design-ideas-for-spacious-interior" class="w-full h-full">
                                <span>
                                    <img alt="Thumbnail" 
                                        src="https://cdn.sanity.io/images/e4rzjq6v/production/05951a0ec1a6ffc54f615ab160649e92fea982d0-800x764.png?rect=0,0,800,468&w=3840&q=75&fit=clip&auto=format"
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
                        <div class="flex gap-3"><a href="/index#"><span
                                    class="inline-block mt-5 text-xs font-medium tracking-wider uppercase  text-orange-700">Travel</span></a>
                        </div>
                        <h2 class="mt-2 text-lg font-semibold tracking-normal text-brand-primary dark:text-white"><span
                                class=" bg-gradient-to-r from-green-200 to-green-100 dark:from-purple-800 dark:to-purple-900 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">This
                                Bread Pudding Will Give You All the Fall Feels</span></h2>
                        <div class="hidden">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 line-clamp-3"><a
                                    href="/post/this-bread-pudding-will-give-you-all-the-fall-feels">I learned this
                                    when I traveled to a remote resort to deliver what was supposed to be a talk for a
                                    group of tech investors. It turned out to be something of a “consult” to five
                                    ultra-wealthy men.</a></p>
                        </div>
                        <div class="flex items-center mt-3 space-x-3 text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-3">
                                <div class="relative flex-shrink-0 w-5 h-5"><span
                                        style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:absolute;top:0;left:0;bottom:0;right:0"><img
                                            alt="Erika Oliver"
                                            src="https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                            decoding="async" data-nimg="fill" class="rounded-full"
                                            style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover;"
                                            sizes="30px"
                                            srcset="https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=16&amp;q=75&amp;fit=clip&amp;auto=format 16w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=32&amp;q=75&amp;fit=clip&amp;auto=format 32w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=48&amp;q=75&amp;fit=clip&amp;auto=format 48w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=64&amp;q=75&amp;fit=clip&amp;auto=format 64w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=96&amp;q=75&amp;fit=clip&amp;auto=format 96w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=128&amp;q=75&amp;fit=clip&amp;auto=format 128w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=256&amp;q=75&amp;fit=clip&amp;auto=format 256w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=384&amp;q=75&amp;fit=clip&amp;auto=format 384w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"><noscript><img
                                                alt="Erika Oliver" sizes="100vw"
                                                srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                                src="https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                                decoding="async" data-nimg="fill"
                                                style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover"
                                                class="rounded-full" loading="lazy" /></noscript></span></div><span
                                    class="text-sm">Erika Oliver</span>
                            </div><span class="text-xs text-gray-300 dark:text-gray-600">•</span><time class="text-sm"
                                datetime="2022-10-19T13:34:00.000Z">October 19, 2022</time>
                        </div>
                    </div>
                    <div class="cursor-pointer group">
                        <div
                            class="relative overflow-hidden transition-all bg-gray-100 rounded-md dark:bg-gray-800   hover:scale-105 aspect-square">
                            <a href="/post/14-architectural-design-ideas-for-spacious-interior" class="w-full h-full">
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
                        <div class="flex gap-3"><a href="/index#"><span
                                    class="inline-block mt-5 text-xs font-medium tracking-wider uppercase  text-orange-700">Travel</span></a>
                        </div>
                        <h2 class="mt-2 text-lg font-semibold tracking-normal text-brand-primary dark:text-white"><span
                                class=" bg-gradient-to-r from-green-200 to-green-100 dark:from-purple-800 dark:to-purple-900 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">I
                                Moved Across the Country and Never Looked Back</span></h2>
                        <div class="hidden">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 line-clamp-3"><a
                                    href="/post/i-moved-across-the-country-and-never-looked-back">I recently went to
                                    the mountains with my friends. We were celebrating 50 years of friendship. It was
                                    very special. Six of us were to be together spending time in the mountains.</a></p>
                        </div>
                        <div class="flex items-center mt-3 space-x-3 text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-3">
                                <div class="relative flex-shrink-0 w-5 h-5"><span
                                        style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:absolute;top:0;left:0;bottom:0;right:0"><img
                                            alt="Joshua Wood"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill" class="rounded-full"
                                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover;filter:blur(20px);background-size:cover;background-image:url(&quot;https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=64&amp;blur=50&amp;q=30&amp;fit=clip&amp;auto=format&quot;);background-position:0% 0%"><noscript><img
                                                alt="Joshua Wood" sizes="100vw"
                                                srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                                src="https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                                decoding="async" data-nimg="fill"
                                                style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover"
                                                class="rounded-full" loading="lazy" /></noscript></span></div><span
                                    class="text-sm">Joshua Wood</span>
                            </div><span class="text-xs text-gray-300 dark:text-gray-600">•</span><time class="text-sm"
                                datetime="2022-10-19T12:34:00.000Z">October 19, 2022</time>
                        </div>
                    </div>
                    <div class="cursor-pointer group">
                        <div
                            class="relative overflow-hidden transition-all bg-gray-100 rounded-md dark:bg-gray-800   hover:scale-105 aspect-square">
                            <a href="/post/14-architectural-design-ideas-for-spacious-interior" class="w-full h-full">
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
                        <div class="flex gap-3"><a href="/index#"><span
                                    class="inline-block mt-5 text-xs font-medium tracking-wider uppercase  text-emerald-700">Personal
                                    Growth</span></a></div>
                        <h2 class="mt-2 text-lg font-semibold tracking-normal text-brand-primary dark:text-white"><span
                                class=" bg-gradient-to-r from-green-200 to-green-100 dark:from-purple-800 dark:to-purple-900 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">3
                                Meaningful Ways to Practice Self-Care as an Introvert</span></h2>
                        <div class="hidden">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 line-clamp-3"><a
                                    href="/post/3-meaningful-ways-to-practice-self-care-as-an-introvert">While AI has
                                    proved superior at complex calculations &amp; predictions, creativity seemed to be
                                    the domain that machines can’t take over.</a></p>
                        </div>
                        <div class="flex items-center mt-3 space-x-3 text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-3">
                                <div class="relative flex-shrink-0 w-5 h-5"><span
                                        style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:absolute;top:0;left:0;bottom:0;right:0"><img
                                            alt="Mario Sanchez"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill" class="rounded-full"
                                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover;filter:blur(20px);background-size:cover;background-image:url(&quot;https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=64&amp;blur=50&amp;q=30&amp;fit=clip&amp;auto=format&quot;);background-position:0% 0%"><noscript><img
                                                alt="Mario Sanchez" sizes="100vw"
                                                srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                                src="https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                                decoding="async" data-nimg="fill"
                                                style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover"
                                                class="rounded-full" loading="lazy" /></noscript></span></div><span
                                    class="text-sm">Mario Sanchez</span>
                            </div><span class="text-xs text-gray-300 dark:text-gray-600">•</span><time class="text-sm"
                                datetime="2022-10-18T14:49:00.000Z">October 18, 2022</time>
                        </div>
                    </div>
                    <div class="cursor-pointer group">
                        <div
                            class="relative overflow-hidden transition-all bg-gray-100 rounded-md dark:bg-gray-800   hover:scale-105 aspect-square">
                            <a href="/post/14-architectural-design-ideas-for-spacious-interior" class="w-full h-full">
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
                        <div class="flex gap-3"><a href="/index#"><span
                                    class="inline-block mt-5 text-xs font-medium tracking-wider uppercase  text-emerald-700">Personal
                                    Growth</span></a></div>
                        <h2 class="mt-2 text-lg font-semibold tracking-normal text-brand-primary dark:text-white"><span
                                class=" bg-gradient-to-r from-green-200 to-green-100 dark:from-purple-800 dark:to-purple-900 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">The
                                Rise of Artificial Intelligence and the Future of Humans</span></h2>
                        <div class="hidden">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 line-clamp-3"><a
                                    href="/post/the-rise-of-artificial-intelligence-and-the-future-of-humans">While AI
                                    has proved superior at complex calculations &amp; predictions, creativity seemed to
                                    be the domain that machines can’t take over.</a></p>
                        </div>
                        <div class="flex items-center mt-3 space-x-3 text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-3">
                                <div class="relative flex-shrink-0 w-5 h-5"><span
                                        style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:absolute;top:0;left:0;bottom:0;right:0"><img
                                            alt="Joshua Wood"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill" class="rounded-full"
                                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover;filter:blur(20px);background-size:cover;background-image:url(&quot;https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=64&amp;blur=50&amp;q=30&amp;fit=clip&amp;auto=format&quot;);background-position:0% 0%"><noscript><img
                                                alt="Joshua Wood" sizes="100vw"
                                                srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                                src="https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                                decoding="async" data-nimg="fill"
                                                style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover"
                                                class="rounded-full" loading="lazy" /></noscript></span></div><span
                                    class="text-sm">Joshua Wood</span>
                            </div><span class="text-xs text-gray-300 dark:text-gray-600">•</span><time class="text-sm"
                                datetime="2022-10-18T13:47:00.000Z">October 18, 2022</time>
                        </div>
                    </div>
                    <div class="cursor-pointer group">
                        <div
                            class="relative overflow-hidden transition-all bg-gray-100 rounded-md dark:bg-gray-800   hover:scale-105 aspect-square">
                            <a href="/post/14-architectural-design-ideas-for-spacious-interior" class="w-full h-full">
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
                        <div class="flex gap-3"><a href="/index#"><span
                                    class="inline-block mt-5 text-xs font-medium tracking-wider uppercase  text-emerald-700">Personal
                                    Growth</span></a></div>
                        <h2 class="mt-2 text-lg font-semibold tracking-normal text-brand-primary dark:text-white"><span
                                class=" bg-gradient-to-r from-green-200 to-green-100 dark:from-purple-800 dark:to-purple-900 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">10
                                Simple Practices That Will Help You Get 1% Better Every Day</span></h2>
                        <div class="hidden">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 line-clamp-3"><a
                                    href="/post/10-simple-practices-that-will-help-you-get-1-better-every-day">How do
                                    we become better every single day? We develop practices that will help move us
                                    incrementally forward. Small steps, taken consistently. This is the path to a good
                                    life.</a></p>
                        </div>
                        <div class="flex items-center mt-3 space-x-3 text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-3">
                                <div class="relative flex-shrink-0 w-5 h-5"><span
                                        style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:absolute;top:0;left:0;bottom:0;right:0"><img
                                            alt="Erika Oliver"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill" class="rounded-full"
                                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover;filter:blur(20px);background-size:cover;background-image:url(&quot;https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=64&amp;blur=50&amp;q=30&amp;fit=clip&amp;auto=format&quot;);background-position:0% 0%"><noscript><img
                                                alt="Erika Oliver" sizes="100vw"
                                                srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                                src="https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                                decoding="async" data-nimg="fill"
                                                style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover"
                                                class="rounded-full" loading="lazy" /></noscript></span></div><span
                                    class="text-sm">Erika Oliver</span>
                            </div><span class="text-xs text-gray-300 dark:text-gray-600">•</span><time class="text-sm"
                                datetime="2022-10-04T15:16:00.000Z">October 04, 2022</time>
                        </div>
                    </div>
                    <div class="cursor-pointer group">
                        <div
                            class="relative overflow-hidden transition-all bg-gray-100 rounded-md dark:bg-gray-800   hover:scale-105 aspect-square">
                            <a href="/post/14-architectural-design-ideas-for-spacious-interior" class="w-full h-full">
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
                        <div class="flex gap-3"><a href="/index#"><span
                                    class="inline-block mt-5 text-xs font-medium tracking-wider uppercase  text-blue-600">Design</span></a>
                        </div>
                        <h2 class="mt-2 text-lg font-semibold tracking-normal text-brand-primary dark:text-white"><span
                                class=" bg-gradient-to-r from-green-200 to-green-100 dark:from-purple-800 dark:to-purple-900 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">Every
                                Artist has to see the Amazing Pictures on the Internet</span></h2>
                        <div class="hidden">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 line-clamp-3"><a
                                    href="/post/every-artist-has-to-see-the-amazing-pictures-on-the-internet">While AI
                                    has proved superior at complex calculations &amp; predictions, creativity seemed to
                                    be the domain that machines can’t take over.</a></p>
                        </div>
                        <div class="flex items-center mt-3 space-x-3 text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-3">
                                <div class="relative flex-shrink-0 w-5 h-5"><span
                                        style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:absolute;top:0;left:0;bottom:0;right:0"><img
                                            alt="Mario Sanchez"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill" class="rounded-full"
                                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover;filter:blur(20px);background-size:cover;background-image:url(&quot;https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=64&amp;blur=50&amp;q=30&amp;fit=clip&amp;auto=format&quot;);background-position:0% 0%"><noscript><img
                                                alt="Mario Sanchez" sizes="100vw"
                                                srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                                src="https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                                decoding="async" data-nimg="fill"
                                                style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover"
                                                class="rounded-full" loading="lazy" /></noscript></span></div><span
                                    class="text-sm">Mario Sanchez</span>
                            </div><span class="text-xs text-gray-300 dark:text-gray-600">•</span><time class="text-sm"
                                datetime="2022-10-02T15:15:00.000Z">October 02, 2022</time>
                        </div>
                    </div>
                    <div class="cursor-pointer group">
                        <div
                            class="relative overflow-hidden transition-all bg-gray-100 rounded-md dark:bg-gray-800   hover:scale-105 aspect-square">
                            <a href="/post/14-architectural-design-ideas-for-spacious-interior" class="w-full h-full">
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
                        <div class="flex gap-3"><a href="/index#"><span
                                    class="inline-block mt-5 text-xs font-medium tracking-wider uppercase  text-blue-600">Technology</span></a>
                        </div>
                        <h2 class="mt-2 text-lg font-semibold tracking-normal text-brand-primary dark:text-white"><span
                                class=" bg-gradient-to-r from-green-200 to-green-100 dark:from-purple-800 dark:to-purple-900 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">How
                                Technology Evolved Under the Bright Sun of Universe</span></h2>
                        <div class="hidden">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 line-clamp-3"><a
                                    href="/post/how-technology-evolved-under-the-bright-sun-of-universe">The evolution
                                    of technology in astronomy and how it has impacted our understanding of the
                                    universe. It also gives a brief history of the major figures that the science
                                    through their innovations </a></p>
                        </div>
                        <div class="flex items-center mt-3 space-x-3 text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-3">
                                <div class="relative flex-shrink-0 w-5 h-5"><span
                                        style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:absolute;top:0;left:0;bottom:0;right:0"><img
                                            alt="Erika Oliver"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill" class="rounded-full"
                                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover;filter:blur(20px);background-size:cover;background-image:url(&quot;https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=64&amp;blur=50&amp;q=30&amp;fit=clip&amp;auto=format&quot;);background-position:0% 0%"><noscript><img
                                                alt="Erika Oliver" sizes="100vw"
                                                srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                                src="https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                                decoding="async" data-nimg="fill"
                                                style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover"
                                                class="rounded-full" loading="lazy" /></noscript></span></div><span
                                    class="text-sm">Erika Oliver</span>
                            </div><span class="text-xs text-gray-300 dark:text-gray-600">•</span><time class="text-sm"
                                datetime="2022-09-30T15:15:00.000Z">September 30, 2022</time>
                        </div>
                    </div>
                    <div class="cursor-pointer group">
                        <div
                            class="relative overflow-hidden transition-all bg-gray-100 rounded-md dark:bg-gray-800   hover:scale-105 aspect-square">
                            <a href="/post/14-architectural-design-ideas-for-spacious-interior" class="w-full h-full">
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
                        <div class="flex gap-3"><a href="/index#"><span
                                    class="inline-block mt-5 text-xs font-medium tracking-wider uppercase  text-orange-700">Travel</span></a>
                        </div>
                        <h2 class="mt-2 text-lg font-semibold tracking-normal text-brand-primary dark:text-white"><span
                                class=" bg-gradient-to-r from-green-200 to-green-100 dark:from-purple-800 dark:to-purple-900 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">Lessons
                                Of Happiness I learned from a Mountain Village</span></h2>
                        <div class="hidden">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 line-clamp-3"><a
                                    href="/post/lessons-of-happiness-i-learned-from-a-mountain-village">I recently went
                                    to the mountains with my friends. We were celebrating 50 years of friendship. It was
                                    very special. Six of us were to be together spending time in the mountains.</a></p>
                        </div>
                        <div class="flex items-center mt-3 space-x-3 text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-3">
                                <div class="relative flex-shrink-0 w-5 h-5"><span
                                        style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:absolute;top:0;left:0;bottom:0;right:0"><img
                                            alt="Joshua Wood"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill" class="rounded-full"
                                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover;filter:blur(20px);background-size:cover;background-image:url(&quot;https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=64&amp;blur=50&amp;q=30&amp;fit=clip&amp;auto=format&quot;);background-position:0% 0%"><noscript><img
                                                alt="Joshua Wood" sizes="100vw"
                                                srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                                src="https://cdn.sanity.io/images/e4rzjq6v/production/cd477178ed12f28ef668adaf9fcae6b8fc351a08-4480x6415.jpg?rect=0,0,4480,3760&amp;w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                                decoding="async" data-nimg="fill"
                                                style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover"
                                                class="rounded-full" loading="lazy" /></noscript></span></div><span
                                    class="text-sm">Joshua Wood</span>
                            </div><span class="text-xs text-gray-300 dark:text-gray-600">•</span><time class="text-sm"
                                datetime="2022-09-25T15:15:00.000Z">September 25, 2022</time>
                        </div>
                    </div>
                    <div class="cursor-pointer group">
                        <div
                            class="relative overflow-hidden transition-all bg-gray-100 rounded-md dark:bg-gray-800   hover:scale-105 aspect-square">
                            <a href="/post/14-architectural-design-ideas-for-spacious-interior" class="w-full h-full">
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
                        <div class="flex gap-3"><a href="/index#"><span
                                    class="inline-block mt-5 text-xs font-medium tracking-wider uppercase  text-purple-600">Lifestyle</span></a>
                        </div>
                        <h2 class="mt-2 text-lg font-semibold tracking-normal text-brand-primary dark:text-white"><span
                                class=" bg-gradient-to-r from-green-200 to-green-100 dark:from-purple-800 dark:to-purple-900 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">There’s
                                Nothing New About Undermining Women’s Autonomy</span></h2>
                        <div class="hidden">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 line-clamp-3"><a
                                    href="/post/there-s-nothing-new-about-undermining-women-s-autonomy">In2007, the
                                    now-defunct San Antonio Independent Christian Film Festival awarded Best of Festival
                                    to a documentary called The Monstrous Regiment of Women a film that
                                    simultaneously.</a></p>
                        </div>
                        <div class="flex items-center mt-3 space-x-3 text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-3">
                                <div class="relative flex-shrink-0 w-5 h-5"><span
                                        style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:absolute;top:0;left:0;bottom:0;right:0"><img
                                            alt="Erika Oliver"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill" class="rounded-full"
                                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover;filter:blur(20px);background-size:cover;background-image:url(&quot;https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=64&amp;blur=50&amp;q=30&amp;fit=clip&amp;auto=format&quot;);background-position:0% 0%"><noscript><img
                                                alt="Erika Oliver" sizes="100vw"
                                                srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                                src="https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                                decoding="async" data-nimg="fill"
                                                style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover"
                                                class="rounded-full" loading="lazy" /></noscript></span></div><span
                                    class="text-sm">Erika Oliver</span>
                            </div><span class="text-xs text-gray-300 dark:text-gray-600">•</span><time class="text-sm"
                                datetime="2022-09-23T15:15:00.000Z">September 23, 2022</time>
                        </div>
                    </div>
                    <div class="cursor-pointer group">
                        <div
                            class="relative overflow-hidden transition-all bg-gray-100 rounded-md dark:bg-gray-800   hover:scale-105 aspect-square">
                            <a href="/post/14-architectural-design-ideas-for-spacious-interior" class="w-full h-full">
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
                        <div class="flex gap-3"><a href="/index#"><span
                                    class="inline-block mt-5 text-xs font-medium tracking-wider uppercase  text-blue-600">Technology</span></a>
                        </div>
                        <h2 class="mt-2 text-lg font-semibold tracking-normal text-brand-primary dark:text-white"><span
                                class=" bg-gradient-to-r from-green-200 to-green-100 dark:from-purple-800 dark:to-purple-900 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">Escape
                                Fantasies of the Tech Billionaires</span></h2>
                        <div class="hidden">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 line-clamp-3"><a
                                    href="/post/escape-fantasies-of-the-tech-billionaires">

                                    I learned this when I traveled to a remote resort to deliver what was supposed to be
                                    a talk for a group of tech investors. It turned out to be something of a “consult”
                                    to five ultra-wealthy men.</a></p>
                        </div>
                        <div class="flex items-center mt-3 space-x-3 text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-3">
                                <div class="relative flex-shrink-0 w-5 h-5"><span
                                        style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:absolute;top:0;left:0;bottom:0;right:0"><img
                                            alt="Erika Oliver"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill" class="rounded-full"
                                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover;filter:blur(20px);background-size:cover;background-image:url(&quot;https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=64&amp;blur=50&amp;q=30&amp;fit=clip&amp;auto=format&quot;);background-position:0% 0%"><noscript><img
                                                alt="Erika Oliver" sizes="100vw"
                                                srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                                src="https://cdn.sanity.io/images/e4rzjq6v/production/4e20f048a69ac41ab7a6b5f1687f0547379b7469-3648x5472.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                                decoding="async" data-nimg="fill"
                                                style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover"
                                                class="rounded-full" loading="lazy" /></noscript></span></div><span
                                    class="text-sm">Erika Oliver</span>
                            </div><span class="text-xs text-gray-300 dark:text-gray-600">•</span><time class="text-sm"
                                datetime="2022-09-21T15:14:00.000Z">September 21, 2022</time>
                        </div>
                    </div>
                    <div class="cursor-pointer group">
                        <div
                            class="relative overflow-hidden transition-all bg-gray-100 rounded-md dark:bg-gray-800   hover:scale-105 aspect-square">
                            <a href="/post/14-architectural-design-ideas-for-spacious-interior" class="w-full h-full">
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
                        <div class="flex gap-3"><a href="/index#"><span
                                    class="inline-block mt-5 text-xs font-medium tracking-wider uppercase  text-emerald-700">Personal
                                    Growth</span></a></div>
                        <h2 class="mt-2 text-lg font-semibold tracking-normal text-brand-primary dark:text-white"><span
                                class=" bg-gradient-to-r from-green-200 to-green-100 dark:from-purple-800 dark:to-purple-900 bg-[length:0px_10px] bg-left-bottom bg-no-repeat transition-[background-size] duration-500 hover:bg-[length:100%_3px] group-hover:bg-[length:100%_10px]">Four
                                Ways to Find Meaning in Life</span></h2>
                        <div class="hidden">
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 line-clamp-3"><a
                                    href="/post/four-ways-to-find-meaning-in-life">It is a cliche philosophical
                                    question, but it touches on something fundamental about how humans relate to the
                                    world around them. </a></p>
                        </div>
                        <div class="flex items-center mt-3 space-x-3 text-gray-500 dark:text-gray-400">
                            <div class="flex items-center gap-3">
                                <div class="relative flex-shrink-0 w-5 h-5"><span
                                        style="box-sizing:border-box;display:block;overflow:hidden;width:initial;height:initial;background:none;opacity:1;border:0;margin:0;padding:0;position:absolute;top:0;left:0;bottom:0;right:0"><img
                                            alt="Mario Sanchez"
                                            src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                                            decoding="async" data-nimg="fill" class="rounded-full"
                                            style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover;filter:blur(20px);background-size:cover;background-image:url(&quot;https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=64&amp;blur=50&amp;q=30&amp;fit=clip&amp;auto=format&quot;);background-position:0% 0%"><noscript><img
                                                alt="Mario Sanchez" sizes="100vw"
                                                srcSet="https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=640&amp;q=75&amp;fit=clip&amp;auto=format 640w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=750&amp;q=75&amp;fit=clip&amp;auto=format 750w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=828&amp;q=75&amp;fit=clip&amp;auto=format 828w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1080&amp;q=75&amp;fit=clip&amp;auto=format 1080w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1200&amp;q=75&amp;fit=clip&amp;auto=format 1200w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=1920&amp;q=75&amp;fit=clip&amp;auto=format 1920w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=2048&amp;q=75&amp;fit=clip&amp;auto=format 2048w, https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format 3840w"
                                                src="https://cdn.sanity.io/images/e4rzjq6v/production/4a21e3f085ed310d00fbbd294eb2392cde7f9acc-3648x3648.jpg?w=3840&amp;q=75&amp;fit=clip&amp;auto=format"
                                                decoding="async" data-nimg="fill"
                                                style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover"
                                                class="rounded-full" loading="lazy" /></noscript></span></div><span
                                    class="text-sm">Mario Sanchez</span>
                            </div><span class="text-xs text-gray-300 dark:text-gray-600">•</span><time class="text-sm"
                                datetime="2022-09-14T15:14:00.000Z">September 14, 2022</time>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
