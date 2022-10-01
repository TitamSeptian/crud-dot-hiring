@extends('app', ['title' => 'Category', 'activePage' => 'category'])
@section('content')
    <h1
        class="text-gray-800 text-3xl font-black capitalize after:content-[''] after:block after:w-10 after:h-1 after:bg-gray-800 after:rounded-full">
        Books
    </h1>
    <a href="{{ route('book.index') }}" class="btn btn-sm mb-4 my-4"><i class='bx bx-arrow-back'></i> Back</a>
    <form action="{{ route('book.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-control">
            <label class="label" for="title">Title</label>
            <input class="input" type="text" name="title" id="title" value="{{ old('title') }}" required
                autocomplete="off" autofocus>
            @error('title')
                <span class="invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-control">
            <label class="label" for="author">author</label>
            <input class="input" type="text" name="author" id="author" value="{{ old('author') }}" required
                autocomplete="off" autofocus>
            @error('author')
                <span class="invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-control">
            <label class="label" for="category">Category</label>
            <select name="category" id="category" class="input">
                <option selected disabled>-- Choose --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-control sm:col-span-2 mt-2">
            <label class="label" for="description">Description</label>
            <textarea class="input" type="text" name="description" id="description" value="{{ old('description') }}" required
                autocomplete="off" autofocus rows="30" cols="50">{{ old('description') }}</textarea>
            @error('description')
                <span class="invalid">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-control mt-2">
            <label class="btn" for="image">Upload Cover</label>
            <input accept="image/png, image/jpeg" class="sr-only" type="file" name="image" id="image"
                data-target="preview-image" onchange="showPreview(event);">
            @error('image')
                <span class="invalid">{{ $message }}</span>
            @enderror
        </div>
        <button class="btn btn-sm mt-4" type="submit" name="submit">Submit</button>
        <div class="aspect-[3/4] rounded-xl overflow-hidden w-full bg-gray-100">
            <img class="w-full h-full object-cover hidden" src="" id="preview-image">
        </div>
    </form>
@endsection
