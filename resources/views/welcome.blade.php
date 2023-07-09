<x-front-guest-layout>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900&display=swap" rel="stylesheet">

    <main class="bg-blue-500 font-montserrat">
        <header class="h-24 sm:h-32 flex items-center">
            <div class="container mx-auto px-6 sm:px-12 flex items-center justify-between">
                <div class="text-black font-black text-2xl flex items-center">
                </div>
                <div class="flex items-center">
                    <nav class="text-black text-lg hidden lg:flex items-center">
                        @if(Route::has('admin.login'))
                            <a href="{{ route('admin.login') }}" class="py-2 px-6 flex hover:text-blue-500">Admin</a>
                        @endif
                        @if (Route::has('login'))
                            @auth('front')
                                <a href="{{ url('/dashboard') }}" class="py-2 px-6 flex hover:text-blue-500">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="ml-4 py-2 px-6 flex hover:text-blue-500">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="py-2 px-6 flex hover:text-blue-500">Register</a>
                                @endif
                            @endauth
                        @endif
                    </nav>
                    <button class="lg:hidden flex flex-col">
                        <span class="w-6 h-px bg-gray-900 mb-1"></span>
                        <span class="w-6 h-px bg-gray-900 mb-1"></span>
                        <span class="w-6 h-px bg-gray-900 mb-1"></span>
                    </button>
                </div>
            </div>
        </header>

        <div class="container  items-center">
            <div>
                <img src="{{ asset('front') }}/bpdb.png" alt="Logo" class="logo">
                <h5 class="text-success text-4xl lg:text-5xl leading-none text-center ml-4 mt-4">বাংলাদেশ বিদ্যুৎ উন্নয়ন বোর্ড</h5>
                <h5 class="text-2xl lg:text-3xl leading-none text-center mt-4">শ্রম ও কল্যাণ পরিদপ্তর, ঢাকা ।</h5>
            </div>
        </div>
    </main>

</x-front-guest-layout>

<style>
    .logo {
        width: 150px;
        height: 150px;
        display: block;
        margin: 0 auto;
        text-align: center;
    }

    .bg-blue-500 {
        background-color: #ADD8E6;
        height: 100vh;
        width: 100%;
    }
</style>
