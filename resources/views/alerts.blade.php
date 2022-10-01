@if (session('success'))
    <div class="flex w-full items-center justify-between rounded-lg border border-green-600 bg-green-300/50 p-5 my-3">
        <h1 class="font-semibold text-green-800">{{ Session::get('success') }}</h1>
        <span class="close-alert hover:cursor-pointer"><i class='bx bx-x'></i></span>
    </div>
@elseif (session('warning'))
    <div class="flex w-full items-center justify-between rounded-lg border border-yellow-600 bg-yellow-300/50 p-5 my-3">
        <h1 class="font-semibold text-yellow-800">{{ Session::get('warning') }}</h1>
        <span class="close-alert hover:cursor-pointer"><i class='bx bx-x'></i></span>
    </div>
@elseif (session('danger'))
    <div class="flex w-full items-center justify-between rounded-lg border border-red-600 bg-red-300/50 p-5 my-3">
        <h1 class="font-semibold text-red-800">{{ Session::get('danger') }}</h1>
        <span class="close-alert hover:cursor-pointer"><i class='bx bx-x'></i></span>
    </div>
@endif
