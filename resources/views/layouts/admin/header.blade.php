     <div class="app-header">
         <div class="app-header-left">
             <span class="app-icon"></span>
             <p class="app-name">
                 <a href="{{ route('admin.settings') }}"
                     style="
                 text-decoration: none;
                 ">
                     <span>
                         <span style="color: rgba(194, 8, 185, 0.333)">
                             {{ general_settings('name') }}
                         </span>
                         Dashboard</span>
                 </a>
             </p>
             <div class="search-wrapper">
                 <input class="search-input" type="text" placeholder="Search">
                 <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                     stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     class="feather feather-search" viewBox="0 0 24 24">
                     <defs></defs>
                     <circle cx="11" cy="11" r="8"></circle>
                     <path d="M21 21l-4.35-4.35"></path>
                 </svg>
             </div>
         </div>
         <div class="app-header-right">
             <button class="mode-switch" title="Switch Theme">
                 <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                     stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                     <defs></defs>
                     <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                 </svg>
             </button>

             <button class="profile-btn">
                 <img src="https://assets.codepen.io/3306515/IMG_2025.jpg" />

             </button>
             <!-- Settings Dropdown -->
             <div class="hidden sm:flex sm:items-center sm:ms-1">
                 <x-dropdown align="right" width="48">
                     <x-slot name="trigger">
                         <button
                             class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                             <div>{{ Auth::user()->name }}</div>

                             <div class="ms-1">
                                 <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                     viewBox="0 0 20 20">
                                     <path fill-rule="evenodd"
                                         d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                         clip-rule="evenodd" />
                                 </svg>
                             </div>
                         </button>
                     </x-slot>

                     <x-slot name="content">
                         <x-dropdown-link :href="route('profile.edit')">
                             {{ __('Profile') }}
                         </x-dropdown-link>

                         <!-- Authentication -->
                         <form method="POST" action="{{ route('logout') }}">
                             @csrf

                             <x-dropdown-link :href="route('logout')"
                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                 {{ __('Log Out') }}
                             </x-dropdown-link>
                         </form>
                     </x-slot>
                 </x-dropdown>
             </div>
         </div>
         <button class="messages-btn">
             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                 stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                 class="feather feather-message-circle">
                 <path
                     d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z" />
             </svg>
         </button>
     </div>
