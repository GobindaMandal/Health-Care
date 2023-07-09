<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'" class="fixed z-30 inset-y-0 left-0 w-64 transition duration-300 transform bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
    <div class="flex items-center justify-center mt-8">
        <div class="flex items-center">
            <a class="underline" href="{{ route('admin.dashboard') }}">
                <span class="text-white text-2xl mx-2 font-semibold">ড্যাশবোর্ড</span>
            </a>
        </div>
    </div>

    <hr class="new5">
    <style>
        hr.new5 {
            border: 10px solid white;
            border-radius: 5px;
        }
    </style>

    <nav class="mt-10">
        <a class="underline flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.dashboard') ? 'active' : '' }} " href="{{ route('admin.dashboard')}}">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
            </svg>

            <span class="mx-3">ড্যাশবোর্ড</span>
        </a>


        @php
        $applicationsRoute = null;
        $doctorsApplicationRoute = null;
        $controllersApplicationRoute = null;
        $committeesApplicationRoute = null;
        $managementsApplicationRoute = null;
        $boardsApplicationRoute = null;
        @endphp

        @canany('Application access','Application add','Application edit','Application delete')
            @php
            $applicationsRoute = route('admin.applications.index');
            $applicationsReport = route('report.applications');
            @endphp
        @endcanany

        @canany('Doctors application access','Doctors application add','Doctors application edit','Doctors application delete')
            @php
            $doctorsApplicationRoute = route('admin.doctorsApplication.index');
            $doctorsApplicationReport = route('report.doctorsApplication');
            @endphp
        @endcanany

        @canany('Controllers application access','Controllers application add','Controllers application edit','Controllers application delete')
            @php
            $controllersApplicationRoute = route('admin.controllersApplication.index');
            $controllersApplicationReport = route('report.controllersApplication');
            @endphp
        @endcanany

        @canany('Committees application access','Committees application add','Committees application edit','Committees application delete')
            @php
            $committeesApplicationRoute = route('admin.committeesApplication.index');
            $committeesApplicationReport = route('report.committeesApplication');
            @endphp
        @endcanany

        @canany('Managements application access','Managements application add','Managements application edit','Managements application delete')
            @php
            $managementsApplicationRoute = route('admin.managementsApplication.index');
            $managementsApplicationReport = route('report.managementsApplication');
            @endphp
        @endcanany

        @canany('Boards application access','Boards application add','Boards application edit','Boards application delete')
            @php
            $boardsApplicationRoute = route('admin.boardsApplication.index');
            $boardsApplicationReport = route('report.boardsApplication');
            @endphp
        @endcanany

        @if($applicationsRoute || $doctorsApplicationRoute || $controllersApplicationRoute || $committeesApplicationRoute || $managementsApplicationRoute || $boardsApplicationRoute || $applicationsReport || $doctorsApplicationReport || $controllersApplicationReport || $committeesApplicationReport || $managementsApplicationReport || $boardsApplicationReport)
            @php
            $currentRoute = Route::currentRouteName();
            @endphp
            <a class="underline flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ ($currentRoute == 'admin.applications.index' && $applicationsRoute) || ($currentRoute == 'admin.doctorsApplication.index' && $doctorsApplicationRoute) || ($currentRoute == 'admin.controllersApplication.index' && $controllersApplicationRoute) || ($currentRoute == 'admin.committeesApplication.index' && $committeesApplicationRoute) || ($currentRoute == 'admin.managementsApplication.index' && $managementsApplicationRoute) || ($currentRoute == 'admin.boardsApplication.index' && $boardsApplicationRoute) ? 'active' : '' }}"
                href="{{ $applicationsRoute ?? $doctorsApplicationRoute ?? $controllersApplicationRoute ?? $committeesApplicationRoute ?? $managementsApplicationRoute ?? $boardsApplicationRoute }}">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>    
                <span class="mx-3">আবেদনের তালিকা</span>
            </a>

            <a class="underline flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100"
                href="{{ $applicationsReport ?? $doctorsApplicationReport ?? $controllersApplicationReport ?? $committeesApplicationReport ?? $managementsApplicationReport ?? $boardsApplicationReport }}">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>    
                <span class="mx-3">রিপোর্ট</span>
            </a>
        @endif


        <!-- @canany('Report access','Report add','Report edit','Report delete')
        <a class="underline flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.reports.index') ? 'active' : '' }}"
            href="{{ route('admin.reports.index') }}">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                </path>
            </svg>

            <span class="mx-3">রিপোর্ট</span>
        </a>
        @endcanany -->

        @canany('Budget access','Budget add','Budget edit','Budget delete')
        <a class="underline flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.budgets.index') ? 'active' : '' }}"
            href="{{ route('admin.budgets.index') }}">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                </path>
            </svg>

            <span class="mx-3">বাজেট</span>
        </a>
        @endcanany

        @canany('Archive access','Archive add','Archive edit','Archive delete')
        <a class="underline flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.archives.index') ? 'active' : '' }}"
            href="{{ route('admin.archives.index') }}">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                </path>
            </svg>

            <span class="mx-3">আর্কাইভ</span>
        </a>
        @endcanany
        
        @canany('Role access','Role add','Role edit','Role delete')
        <a class="underline flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.roles.index') ? 'active' : '' }}"
            href="{{ route('admin.roles.index') }}">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                </path>
            </svg>

            <span class="mx-3">রোল</span>
        </a>
        @endcanany
        
        @canany('Permission access','Permission add','Permission edit','Permission delete')
            <a class="underline flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.permissions.index') ? 'active' : '' }}"
            href="{{ route('admin.permissions.index') }}">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                </path>
            </svg>

            <span class="mx-3">পারমিশন</span>
        </a>
        @endcanany
        
        @canany('User access','User add','User edit','User delete')
        <a class="underline flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.users.index') ? 'active' : '' }}"
            href="{{ route('admin.users.index')}}">
            <span class="inline-flex justify-center items-center">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
        </span>

            <span class="mx-3">অ্যাডমিন ইউজার</span>
        </a>
        @endcanany

        <!-- @canany('Userlist access','Userlist add','Userlist edit','Userlist delete')
        <a class="underline flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.users_list.index') ? 'active' : '' }}"
            href="{{ route('admin.users_list.index')}}">
            <span class="inline-flex justify-center items-center">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
        </span>

            <span class="mx-3">ইউজার লিস্ট</span>
        </a>
        @endcanany -->
        
        <!-- @canany('Post access','Post add','Post edit','Post delete')
            <a class="underline flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.posts.index') ? 'active' : '' }}"
            href="{{ route('admin.posts.index')}}">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                </path>
            </svg>    
            <span class="mx-3">Post</span>
        </a>
        @endcanany -->

    </nav>
</div>
