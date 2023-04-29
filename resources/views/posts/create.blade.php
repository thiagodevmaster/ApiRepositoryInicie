<x-layout title="create post">
    <form action="{{ route('posts.store', $id) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" class="form-control shadow-sm rounded" name="title" id="title">
        </div>

        <div class="form-floating">
            <textarea class="form-control shadow-sm rounded" name="body" placeholder="Enter the post content here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Content</label>
        </div>

        <button type="submit" class="btn btn-secondary mt-3">Submit</button>
        
    </form>
</x-layout>