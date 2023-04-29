<x-layout title="Posts">
    @if(empty($posts))
        <h4>there are no posts made by this user &#128531;</h4>
    @else
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @php $cont=0; @endphp
        @foreach($posts as $post)
        <div class="col">
        <div class="card text-center shadow rounded" style="width: 18rem;">
            <img src="https://www.totaltoner.com.br/loja/img/system/sem-imagem.gif" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><strong>{{ $post['title'] }}</strong></h5>
                <form action="{{ route('posts.show', $post['user_id'] ) }}" method="get">
                    @csrf
                    <input type="hidden" name="post" value="{{ $cont }}">
                    <input type="hidden" name="id_post" value="{{ $post['id'] }}">
                    <button type="submit" class="btn btn-secondary mt-4">View post <i class="fa-solid fa-eye"></i></button>
                </form>
            </div>
        </div>
        </div>
        @php $cont += 1 @endphp
        @endforeach
    </div>
    @endif

    <div class="d-flex align-items-center mt-5">
        <a href="{{ route('users.index') }}" class="btn btn-dark">Back</a>
        <a href="{{ route('posts.create', $id) }}" class="btn btn-secondary ms-3">Create Post</a>
    </div>
</x-layout>