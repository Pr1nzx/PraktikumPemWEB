@extends('layouts.app')

@section('title', 'List of Items')

@section('content')
    <div class="container">
        <h1 class="text-center">LIST OF ITEMS</h1>
        <a href="{{ route('items.create') }}" class="btn btn-primary mb-3">Add New Item</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Gender</th>
                    <th>File</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->gender }}</td>
                    <td>
                        @if ($item->file_path)
                            <a href="{{ asset('storage/' . $item->file_path) }}" target="_blank">Download File</a>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('items.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
