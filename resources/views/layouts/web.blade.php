<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/all.min.css','resources/css/style.css','resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class=" antialiased">
      <section class="navigation">
        <div class="w-full text-gray-700 bg-white dark:text-gray-200 dark:bg-gray-800">
            <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-8">
                <div class="flex flex-row items-center justify-between p-4">
                    <a href="#" class="text-3xl">Lo<span class="text-4xl font-bold text-orange-500">ko</span>mo</a>
                    <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-end md:flex-row">
                    <a class="px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-orange-600 dark:focus:bg-orange-600 dark:focus:text-white dark:hover:text-white dark:text-orange-200 md:mt-0 md:ml-4 hover:text-orange-900 focus:text-orange-900 hover:bg-orange-200 focus:bg-orange-200 focus:outline-none focus:shadow-outline" href="/">Home</a>
                    <a class="px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-orange-600 dark:focus:bg-orange-600 dark:focus:text-white dark:hover:text-white dark:text-orange-200 md:mt-0 md:ml-4 hover:text-orange-900 focus:text-orange-900 hover:bg-orange-200 focus:bg-orange-200 focus:outline-none focus:shadow-outline" href="#">About</a>
                    <a class="px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-orange-600 dark:focus:bg-orange-600 dark:focus:text-white dark:hover:text-white dark:text-orange-200 md:mt-0 md:ml-4 hover:text-orange-900 focus:text-orange-900 hover:bg-orange-200 focus:bg-orange-200 focus:outline-none focus:shadow-outline" href="{{ route('categories.index') }}">Category</a>
                    <a class="px-4 py-2 mt-2 text-lg font-semibold bg-transparent rounded-lg dark:bg-transparent dark:hover:bg-orange-600 dark:focus:bg-orange-600 dark:focus:text-white dark:hover:text-white dark:text-orange-200 md:mt-0 md:ml-4 hover:text-orange-900 focus:text-orange-900 hover:bg-orange-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('menus.index') }}">Our Menus</a>
    
    
                    <div @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark:bg-transparent dark:focus:text-white dark:hover:text-white dark:focus:bg-gray-600 dark:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                            <span>Make Reservation</span>
                            <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full md:max-w-screen-sm md:w-screen mt-2 origin-top-right z-30">
                            <div class="px-2 pt-2 pb-4 bg-white rounded-md shadow-lg dark:bg-gray-700">
                              <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <a class=" flex row items-start rounded-lg bg-transparent p-2 dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="{{ route('reservations.step.one') }}">
                                  <div class="bg-teal-500 text-white rounded-lg p-3">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="md:h-6 md:w-6 h-4 w-4"><path d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                                  </div>
                                  <div class="ml-3">
                                    <p class="font-semibold">Appearance</p>
                                    <p class="text-sm">Easy customization</p>
                                  </div>
                                </a>
    
                                <a class=" flex row items-start rounded-lg bg-transparent p-2 dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">
                                  <div class="bg-teal-500 text-white rounded-lg p-3">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="md:h-6 md:w-6 h-4 w-4"><path d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                                  </div>
                                  <div class="ml-3">
                                    <p class="font-semibold">Comments</p>
                                    <p class="text-sm">Check your latest comments</p>
                                  </div>
                                </a>
    
                                <a class="flex row items-start rounded-lg bg-transparent p-2 dark:hover:bg-gray-600 dark:focus:bg-gray-600 dark:focus:text-white dark:hover:text-white dark:text-gray-200 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="#">
                                  <div class="bg-teal-500 text-white rounded-lg p-3">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="md:h-6 md:w-6 h-4 w-4"><path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path><path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path></svg>
                                  </div>
                                  <div class="ml-3">
                                    <p class="font-semibold">Analytics</p>
                                    <p class="text-sm">Take a look at your statistics</p>
                                  </div>
                                </a>
                              </div>
                            </div>
                        </div>
                    </div>   
                </nav>
            </div>
        </div>
      </section>
                {{ $slot }}
    <footer class=" p-10 mx-auto bg-gradient-to-r from-orange-300 to-orange-300">
      <div class="container">
        <div class="flex flex-col md:flex-row flex-wrap justify-center">
          <div class="w-full md:basis-[30%] md:min-w-[250px]">
            <div class="logo">
              <h1 class="text-5xl font-bold">Lo<span class="text-6xl text-orange-600">ko</span>mo</h1>
              <p class="max-w-[270px] mt-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam cum ducimus atque optio corporis vero inventore hic eaque rerum blanditiis?</p>
            </div>
          </div>
          <div class="w-full md:basis-[27%] md:min--[250px] ">
           <div class="menu">
             <h1 class="text-2xl font-bold">Useful Links</h1>
             <ul>
               <li class="mb-2"><a href="" class="underline">Home</a></li>
               <li class="mb-2"><a href="" class="underline">About Us</a></li>
               <li class="mb-2"><a href="" class="underline">Menus</a></li>
               <li class="mb-2"><a href="" class="underline">Categories</a></li>
               <li class="mb-2"><a href="" class="underline">Make Resuervations</a></li>
             </ul>
           </div>
         </div>
         <div class="w-full md:basis-[27%] md:min-w-[250px] ">
           <div class="menu">
             <h1 class="text-2xl font-bold">Social Links</h1>
             <ul>
               <li class="mb-2"><a href="" class=" text-lg">Faceook <i class="fab fa-facebook"></i></a></li>
               <li class="mb-2"><a href="" class=" text-lg">Twitter <i class="fab fa-twitter"></i></a></li>
               <li class="mb-2"><a href="" class=" text-lg">Instagram <i class="fab fa-instagram"></i></a></li>
               <li class="mb-2"><a href="" class=" text-lg">Linkedin <i class="fab fa-linkedin"></i></a></li>
             </ul>
           </div>
         </div>
       </div>
      </div>
    </footer>
    </body>
</html>