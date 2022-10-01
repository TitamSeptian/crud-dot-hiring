<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div
            class="px-8 py-2 mt-4 text-left bg-white shadow-lg flex flex-col justify-center rounded-md w-auto gap-4 md:w-96 h-[120%] md:h-96">
            <h3 class="text-xl font-bold text-center">Login to your account</h3>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="mt-4">
                    <div class="form-control">
                        <label class="label" for="email">Email</label>
                        <input class="input" type="text" name="email" id="email" value="" required
                            autocomplete="off" autofocus>
                        @error('emails')
                            <span class="invalid">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-control">
                        <label class="label" for="name">Password</label>
                        <input class="input" type="password" name="password" id="password" value="" required
                            autocomplete="off" autofocus>
                        @error('password')
                            <span class="invalid">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex items-baseline justify-between">
                        <button class="btn btn-sm mt-4" type="submit" name="submit">Login</button>
                        <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:text-gray-900">Register</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
