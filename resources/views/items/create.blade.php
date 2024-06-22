@extends('layouts.app')

@section('title', 'Create New Item')

@section('content')
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        form {
            margin: 0 auto;
            max-width: 400px;
        }

        label, input, textarea, button, select {
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

    <h1 style="text-align: center;">Create New Item</h1>
    <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="gender">Gender:</label><br>
        <select id="gender" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br>
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br>
        <label for="file">Upload File:</label>
        <input type="file" id="file" name="file"><br>
        <button type="submit">Create</button>
    </form>
@endsection
