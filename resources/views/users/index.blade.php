<x-layout title="Users List" :successMessage="$successMessage">
    <ul class="list-group mb-4">
        @if(!isset($search_name))
            @foreach($users as $user)
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    <a href="{{ route('posts.index', $user['id']) }}" class="text-black text-decoration-none">
                        {{ $user['name'] }}
                    </a>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('users.edit', $user['id']) }}" class="btn btn-secondary btn-sm">
                            <i class="fa-solid fa-user-pen"></i>
                        </a>

                        <form action="{{ route('users.destroy', $user['id']) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm ms-2">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @for($i=1; $i <= count($users); $i++)
                        <li class="page-item"><a class="page-link" href="http://localhost/home?page={{ $i }}&per_page=20">{{ $i }}</a></li>
                    @endfor
                </ul>
            </nav>
        @else
        @foreach($users as $user)
            @if($search_name === $user['name'])
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    <a href="{{ route('posts.index', $user['id']) }}" class="text-black text-decoration-none">
                        {{ $user['name'] }}
                    </a>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('users.edit', $user['id']) }}" class="btn btn-secondary btn-sm">
                            <i class="fa-solid fa-user-pen"></i>
                        </a>

                        <form action="{{ route('users.destroy', $user['id']) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm ms-2">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </li>
                @endif
            @endforeach
        </ul>
        @endif

    
</x-layout>