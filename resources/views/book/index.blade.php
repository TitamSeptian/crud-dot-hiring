@extends('app', ['title' => 'Book', 'activePage' => 'book'])
@section('content')
    <h1
        class="text-gray-800 text-3xl font-black capitalize after:content-[''] after:block after:w-10 after:h-1 after:bg-gray-800 after:rounded-full">
        Books
    </h1>
    <a href="{{ route('book.create') }}" class="btn btn-sm mb-4 my-4"><i class='bx bx-plus'></i> Add</a>

    <div class="py-2 lg:mt-0 rounded bg-white overflow-x-auto table-wrapper">
        <table class="min-w-full" id="dataTable">
            <thead class="thead">
                <tr>
                    <th scope="col" class="th">Image</th>
                    <th scope="col" class="th">Title</th>
                    <th scope="col" class="th">Author</th>
                    <th scope="col" class="th"></th>
                </tr>
            </thead>
            <tbody class="divide-y-2">
                @foreach ($books as $book)
                    <tr>
                        <td class="td font-medium text-gray-900">
                            <img class="object-cover h-auto max-w-[100px] aspect-[1/1]"
                                src="{{ \Storage::url($book->image) }}" alt="">
                        </td>
                        <td class="td font-medium text-gray-900">{{ $book->title }}</td>
                        <td class="td font-medium text-gray-900">{{ $book->author }}</td>
                        <td class="td flex space-x-2 justify-end items-center h-full">
                            <a class="btn btn-sm" href="{{ route('book.edit', $book->id) }}">Edit</a>
                            <form action="{{ route('book.destroy', $book->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline" type="submit"
                                    onClick="javascript: return confirm('This Book will be deleted ?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
