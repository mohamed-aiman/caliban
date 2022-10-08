@extends('layouts.guest')

@section('body')
<table>
    <tr>
        <th class="border border-green-800">#</th>
        <th class="border border-green-800">id</th>
        <th class="border border-green-800">name</th>
        {{-- <th class="border border-green-800">mtime</th> --}}
        {{-- <th class="border border-green-800">images</th> --}}
        <th class="border border-green-800">parent_id</th>
        <th class="border border-green-800">level</th>
        <th class="border border-green-800">category</th>
        <th class="border border-green-800">sub_category</th>
        <th class="border border-green-800">third_level_category</th>
        <th class="border border-green-800">fourth_level_category</th>
        <th class="border border-green-800">fifth_level_category</th>
    </tr>
    @foreach($categories as $key => $category)
    <tr>
        <td class="border border-green-800">{{ $key+1 }}</td>
        <td class="border border-green-800">{{ $category->id }}</td>
        <td class="border border-green-800">{{ $category->name }}</td>
        {{-- <td class="border border-green-800">{{ $category->mtime }}</td> --}}
        {{-- <td class="border border-green-800">{{ $category->images }}</td> --}}
        <td class="border border-green-800">{{ $category->parent_id }}</td>
        <td class="border border-green-800">{{ $category->level }}</td>
        <td class="border border-green-800">{{ $category->category }}</td>
        <td class="border border-green-800">{{ $category->sub_category }}</td>
        <td class="border border-green-800">{{ $category->third_level_category }}</td>
        <td class="border border-green-800">{{ $category->fourth_level_category }}</td>
        <td class="border border-green-800">{{ $category->fifth_level_category }}</td>

    </tr>
    @endforeach
</table>
@endsection
