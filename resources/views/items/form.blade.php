<form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="file">Upload File:</label>
        <input type="file" id="file" name="file" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
