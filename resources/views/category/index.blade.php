@extends('app', ['title' => 'Category', 'activePage' => 'category'])
@section('content')
    <h1
        class="text-gray-800 text-3xl font-black capitalize after:content-[''] after:block after:w-10 after:h-1 after:bg-gray-800 after:rounded-full">
        Categories
    </h1>
    <a href="{{ route('category.create') }}" class="btn btn-sm mb-4 my-4"><i class='bx bx-plus'></i> Add</a>

    {{-- <div class="overflow-x-auto table-wrapper"> --}}
    {{-- <div class="inline-block p-3 min-w-full"> --}}
    <div class="py-2 lg:mt-0 rounded bg-white overflow-x-auto table-wrapper">
        <table class="min-w-full" id="dataTable">
            <thead class="thead">
                <tr>
                    <th scope="col" class="th">Name</th>
                    <th scope="col" class="th"></th>
                </tr>
            </thead>
            <tbody class="divide-y-2">
                @foreach ($categories as $category)
                    <tr>
                        <td class="td font-medium text-gray-900">{{ $category->name }}</td>
                        <td class="td flex space-x-2 justify-end items-center h-full">
                            <a class="btn btn-sm" href="{{ route('category.edit', $category->id) }}">Edit</a>
                            <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline" type="submit"
                                    onClick="javascript: return confirm('This Category will be deleted ?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
