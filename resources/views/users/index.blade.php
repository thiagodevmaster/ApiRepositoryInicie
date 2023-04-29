<x-layout title="User List">

<ul class="list-group">
    @foreach($users as $user)
    <li class="list-group-item d-flex align-items-center justify-content-between">
    <div>
        <a href="http://" class="text-black text-decoration-none text-capitalize">
            {{ $user['name'] }}
        </a>
    </div>    
    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('users.edit', $user['id']) }}" class="btn btn-secondary btn-sm"><i class="fa-solid fa-user-pen"></i></a>
        <form action="{{ route('users.destroy', $user['id']) }}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm ms-2" type="submit"><i class="fa-solid fa-trash-can"></i></button>
        </form>
    </div>
    </li>
    @endforeach
</ul>

<nav aria-label="Page navigation example" class="mt-4">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">4</a></li>
    <li class="page-item"><a class="page-link" href="#">5</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
</x-layout>
    
