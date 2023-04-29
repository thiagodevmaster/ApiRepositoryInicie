<x-layout title="Login">
    <form action="" method="post">
            @csrf
            <div class="mb-3 form-group">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" required class="form-control shadow-sm">
            </div>

            <div class="mb-3 form-group">
                <label for="password" class="form-label">Password:</label>
                <input type="password" name="password" id="password" required class="form-control shadow-sm">
            </div>

            <button type="submit" class="btn btn-dark mt-3">Login</button>
            <a href="{{ route('user.create') }}" class="btn btn-secondary mt-3 ms-3">Register</a>
        </form>
</x-layout>