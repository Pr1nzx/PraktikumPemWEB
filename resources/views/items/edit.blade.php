@extends('layouts.app')

@section('title', 'Edit Item')

@section('content')
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        form {
            margin: 0 auto;
            max-width: 400px;
        }

        label, input, textarea, button {
            display: block;
            margin-bottom: 10px;
            width: 100%;
            padding: 8px;
        }

        button {
            background-color: #FFA500;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>

    <h1 style="text-align: center;">Edit Item</h1>
    <form method="POST" action="{{ route('items.update', $item->id) }}">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $item->name }}"><br>
        <label for="gender">Gender:</label><br>
        <select id="gender" name="gender">
            <option value="male" {{ $item->gender === 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ $item->gender === 'female' ? 'selected' : '' }}>Female</option>
        </select><br>
        <label for="description">Description:</label>
        <textarea id="description" name="description">{{ $item->description }}</textarea><br>
        <button type="submit">Update</button>
    </form>
@endsection
