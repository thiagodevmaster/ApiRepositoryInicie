<?php

namespace App\Http\Controllers;

use App\Repositories\Comments\CommentsRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function __construct(private CommentsRepository $commentRepository)
    {
        
    }

    public function store(Request $request, int $id)
    {
        // dd($request->all(), $id);
        $data = [
            'post_id' => $id,
            'name' => $request->name,
            'email' => $request->email,
            'body' => $request->comment
        ];
        
        $this->commentRepository->addComment($id, $data);

        return to_route('users.index');
    }

    public function destroy(int $id)
    {
        
        $this->commentRepository->deleteComment($id);
        return redirect('/home');
    }
}
