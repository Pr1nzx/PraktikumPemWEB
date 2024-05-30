@extends('layouts.app')

@section('title', 'List of Items')

@section('content')
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            border: none;
            background: none;
            color: red;
            cursor: pointer;
        }
    </style>

    <h1 style="text-align: center;">List of Items</h1>
    <a href="{{ route('items.create') }}" style="display: block; margin-bottom: 20px;">Add New Item</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Gender</th> 
            <th>Actions</th>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->gender }}</td> 
            <td>
                <a href="{{ route('items.edit', $item->id) }}" style="margin-right: 5px;">Edit</a>
                <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
