<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD APP</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="relative min-h-screen overflow-x-hidden">
        <section class="relative flex max-h-screen min-h-screen overflow-hidden">
            {{-- sidebar --}}
            <aside
                class="lg:w-[400px] w-[300px] max-w-full px-8 overflow-x-hidden overflow-y-auto py-4 mt-14 lg:static absolute inset-y-0 bg-red z-10 bg-white transition-all duration-300">
                <div class="space-y-6">
                    <div class="space-y-2">
                        <span class="px-6 text-sm font-bold tracking-widest uppercase text-gray-600">
                            Dashboard
                        </span>
                        <div class="grid gap-2">
                            <a href="{{ route('home') }}"
                                class="flex items-center gap-2 px-6 py-4 transition-all duration-300 hover:bg-gray-100 rounded-xl group {{ $activePage == 'home' ? 'bg-gray-100 text-gray-600' : '' }}">
                                <i
                                    class="text-xl text-gray-400 transition-all duration-300 bx bxs-dashboard group-hover:text-gray-600"></i>
                                <span
                                    class="font-semibold text-gray-400 transition-all duration-300 group-hover:text-gray-600">
                                    Home
                                </span>
                            </a>
                        </div>
                        <div class="grid gap-2 ">
                            <a href="{{ route('book.index') }}"
                                class="flex items-center gap-2 px-6 py-4 transition-all duration-300 hover:bg-gray-100 rounded-xl group {{ $activePage == 'book' ? 'bg-gray-100 text-gray-600' : '' }}"
                                id="rooms">
                                <i
                                    class="text-xl text-gray-400 transition-all duration-300 bx bx-repost group-hover:text-gray-600"></i>
                                <span
                                    class="font-semibold text-gray-400 transition-all duration-300 group-hover:text-gray-600">
                                    Books
                                </span>
                            </a>
                        </div>
                        <div class="grid gap-2 ">
                            <a href="{{ route('category.index') }}"
                                class="flex items-center gap-2 px-6 py-4 transition-all duration-300 hover:bg-gray-100 rounded-xl group {{ $activePage == 'category' ? 'bg-gray-100 text-gray-600' : '' }}">
                                <i
                                    class="text-xl text-gray-400 transition-all duration-300 bx bx-building group-hover:text-gray-600"></i>
                                <span
                                    class="font-semibold text-gray-400 transition-all duration-300 group-hover:text-gray-600">
                                    Category
                                </span>
                            </a>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <span class="px-6 text-sm font-bold tracking-widest uppercase text-gray-600">
                            Account
                        </span>
                        <div class="grid gap-2">
                            <a href="javascript:void(0)" id="btn-logout"
                                class="flex items-center gap-2 px-6 py-4 transition-all duration-300 hover:bg-gray-100 rounded-xl group">
                                <i
                                    class="text-xl text-gray-400 transition-all duration-300 bx bx-log-out group-hover:text-gray-600"></i>
                                <span
                                    class="font-semibold text-gray-400 transition-all duration-300 group-hover:text-gray-600">
                                    Logout
                                </span>
                            </a>
                            <form action="{{ route('logout') }}" method="post" id="form-logout">
                                @csrf
                                @method('POST')
                            </form>
                        </div>
                    </div>
                </div>
            </aside>
            {{-- endsidebar --}}
            <main class="w-full px-8 pt-20 pb-4 overflow-y-auto">
                {{-- navbar --}}
                <nav class="fixed inset-x-0 top-0 z-50 py-2 border-b border-gray-100 backdrop-blur-sm bg-white/30">
                    <div class="flex items-center justify-between px-8 bg-transparent lg:px-14">
                        <div class="flex items-center gap-4">
                            <button class="lg:hidden btn btn-icon" id="btn-menu">
                                <i class="bx bx-menu-alt-left"></i>
                            </button>
                            <a href="/">
                                {{-- <img src="" class="object-cover w-auto h-8" alt="Logo" /> --}}
                                <span class="text-xl font-bold text-gray-800">CRUD APP</span>
                            </a>
                        </div>
                        <div class="flex items-center gap-2 font-semibold text-gray-400 bg-transparent text-md">
                            <span>{{ Auth::user()->name }}</span>
                        </div>
                    </div>
                </nav>
                {{-- endnavbar --}}
                {{-- content --}}
                <div class="">
                    @include('alerts')
                    @yield('content')
                </div>
                {{-- endcontent --}}
            </main>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script src="{{ asset('script.js') }}"></script>

    <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                let src = URL.createObjectURL(event.target.files[0]);
                let target = event.target.dataset.target;
                console.log(target);
                let preview = document.getElementById(target);
                preview.src = src;
                preview.classList.remove("hidden");
            }
        }
        $(document).ready(function() {
            $("body").on("click", "#btn-logout", function() {
                $("#form-logout").submit();
            });
        });
    </script>
</body>

</html>
