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

    <div class="container">
        <h1 style="text-align: center;">Edit Item</h1>
        <form method="POST" action="{{ route('items.update', $item->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $item->name }}" required class="form-control">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" class="form-control">
                    <option value="male" {{ $item->gender === 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $item->gender === 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" class="form-control">{{ $item->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="file">Upload File:</label>
                <input type="file" id="file" name="file" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
