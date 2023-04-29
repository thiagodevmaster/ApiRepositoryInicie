<x-layout title="Registre-se">
    <form action="" method="post">
        @csrf
        <div class="mb-3 form-group">
            <label for="name" class="form-label">Name:</label>
            <input type="text" name="name" id="name" required class="form-control">
        </div>
        
        <div class="mb-3 form-group">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" required class="form-control">
        </div>

        <div class="mb-3 form-group">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" id="password" required class="form-control">
        </div>

        <button type="submit" class="btn btn-secondary mt-3">Register now</button>
    </form>
</x-layout>