<x-layout title="{!! $post[0]['title'] !!}">

    <p class="card-text mb-5">{{ $post[0]['body'] }}</p>
    <hr>
    
    <section class="mt-5 container-fluid p-5 bg-ligth">
        @isset($comments)
            @foreach($comments as $comment)
            
            <div class="bg-secondary p-4 mb-5"> 
                <div class="d-flex align-items-center">
                    <img src="https://dev.promoview.com.br/uploads/2017/04/b72a1cfe.png" class="rounded-circle" width="50px" height="50px" alt="">
                    <strong class="ms-3">{{ $comment['name'] }} | {{ $comment['email'] }} | 
                        <form action="{{ route('comments.destroy', $comment['id']) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-secondary btn-sm" type="submit">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </strong>
                </div>
                <p class="fst-italic ms-5 text-white">{{ $comment['body'] }}</p>
                <hr>
            </div>
            @endforeach
        @endisset

        <form action="{{ route('comments.store', $id_post) }}" method="post">
            @csrf
            <div class="mb-3 row">
                <input type="hidden" name="idPost" value="{{ $id }}">
                <div class="col-6">
                    <label for="name" class="form-label text-black">name:</label>
                    <input type="text" name="name" class="form-control shadow rouded" id="name" required>
                </div>
                    <div class="col-6">
                    <label for="email" class="form-label text-black">email:</label>
                <input type="email" name="email" class="form-control shadow rouded" id="email" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label text-black">Comment:</label>
                <textarea name="comment" class="form-control shadow rouded" id="comment" cols="30" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-dark mt-3">Comment</button>
        </form>
    </section>
    
</x-layout>