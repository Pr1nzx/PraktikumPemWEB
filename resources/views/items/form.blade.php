@extends('layouts.app')

@section('title', isset($item) ? 'Edit Item' : 'Create Item')

@section('content')
    <h1>{{ isset($item) ? 'Edit Item' : 'Create Item' }}</h1>
    <form method="POST" action="{{ isset($item) ? route('items.update', $item->id) : route('items.store') }}">
        @csrf
        @if(isset($item))
            @method('PUT')
        @endif
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="{{ isset($item) ? $item->name : '' }}"><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description">{{ isset($item) ? $item->description : '' }}</textarea><br>
        <button type="submit">{{ isset($item) ? 'Update' : 'Create' }}</button>
    </form>
@endsection
