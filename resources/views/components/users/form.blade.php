<form action="{{ $action }}" method="post">
        @csrf
        @if($update)
            @method('PATCH')
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" 
                   class="form-control shadow-sm rounded" 
                   name="name" 
                   id="name" 
                   autofocus 
                   required
                   @isset($user) value="{{ $user['name'] }}" @endisset />
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" 
                   class="form-control shadow-sm rounded" 
                   name="email" 
                   id="email" 
                   required
                   @isset($user) value="{{ $user['email'] }}" @endisset />
        </div>
        @unless(isset($user))
        <div class="mb-3">
            <label for="gender" class="mb-2">Gender:</label>
            <select class="form-select shadow-sm rounded" aria-label="gender" name="gender">
                <option value="male" selected>Male</option>
                <option value="female">Female</option>
                <option value="undefined">I prefer not to say</option>
            </select>
        </div>
        @endunless
        <button type="submit" class="btn btn-secondary mt-3">Submit</button>
    </form>
