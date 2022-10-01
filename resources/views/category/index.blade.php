@extends('app', ['title' => 'Category', 'activePage' => 'category'])
@section()
    <h1
        class="text-gray-800 text-3xl font-black capitalize after:content-[''] after:block after:w-10 after:h-1 after:bg-gray-800 after:rounded-full">
        Services
    </h1>
    <a href="{{ route('service.create') }}" class="btn btn-sm mb-4 my-4"><i class='bx bx-plus'></i> Tambah</a>

    {{-- <div class="overflow-x-auto table-wrapper"> --}}
    {{-- <div class="inline-block p-3 min-w-full"> --}}
    <div class="py-2 lg:mt-0 rounded bg-white overflow-x-auto table-wrapper">
        <table class="min-w-full" id="dataTable">
            <thead class="thead">
                <tr>
                    <th scope="col" class="th">Icon</th>
                    <th scope="col" class="th">Title</th>
                    <th scope="col" class="th">Deskripsi</th>
                    <th scope="col" class="th">Tipe</th>
                    <th scope="col" class="th"></th>
                </tr>
            </thead>
        </table>
    </div>
@endsection
