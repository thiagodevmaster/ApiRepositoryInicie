<?php

namespace App\Http\Controllers;

use App\Repositories\Comments\CommentsRepository;
use App\Repositories\Posts\PostRepository;
use Exception;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function __construct(
        private PostRepository $postsRepository, 
        private CommentsRepository $commentsRepository)
    {
    }

    public function index(int $id)
    {
        $posts = $this->postsRepository->allPosts($id);
        
        return view('posts.index', [
            'posts' => $posts,
            'id' => $id,
        ]);
    }


    public function create(int $id)
    {
        return view('posts.create', [
            'id' => $id
        ]);
    }

    public function store(int $id, Request $request)
    {
        $due_on = date('d/m/Y H:i');
        $dataPost = [
            'user_id' => $id,
            'title'   => $request->title,
            'body'    => $request->body,
        ];

        $dataTodos = [
            'user_id' => $id,
            'title'   => $request->title,
            'due_on'  => $due_on,
            'status'  => 'completed'
        ];

        try{
            $this->postsRepository->addPost($id, $dataPost);
            $this->postsRepository->addAll($id, $dataTodos);
            return redirect("/posts/$id")->with('success_message', 'post successfully added');
        }catch(Exception $e){
            return redirect("/posts/$id")->with('error_message', 'There was an error adding the post');
        }
    }


    public function show(int $id, Request $request)
    {
        $post = $this->postsRepository->findPostById($id);
        $comments = $this->commentsRepository->getAll($request->id_post);
        
        return view('posts.show', [
            'post' => $post,
            'id' => $id,
            'id_post' => $request->id_post,
            'comments' => $comments
        ]);
    }

}
