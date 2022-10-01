@extends('app', ['title' => 'Category', 'activePage' => 'category'])
@section('content')
    <h1
        class="text-gray-800 text-3xl font-black capitalize after:content-[''] after:block after:w-10 after:h-1 after:bg-gray-800 after:rounded-full">
        Categories
    </h1>
    <a href="{{ route('category.index') }}" class="btn btn-sm mb-4 my-4"><i class='bx bx-arrow-back'></i> Back</a>
    <form action="{{ route('category.store') }}" method="post">
        @csrf
        <div class="form-control">
            <label class="label" for="name">Name</label>
            <input class="input" type="text" name="name" id="name" value="{{ old('name') }}" required
                autocomplete="off" autofocus>
            @error('name')
                <span class="invalid">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-sm mt-4" type="submit" name="submit">Submit</button>

    </form>
@endsection
