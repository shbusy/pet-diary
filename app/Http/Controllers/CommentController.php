<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Post;

class CommentController extends Controller
{

    // 댓글 작성
    public function store(StoreCommentRequest $request, Post $post)
    {
        // 작성자에 대한 정보
        $user = $request->user();

        if (!$comment = $user->comments()->make($request->validated())) { // 의존성 해결을 위해 make 메소드를 사용
            return with([
                'msg' => '댓글 작성에 실패했습니다. 다시 시도해주세요',
                'result' => 'f'
            ]);
        }

        // 소속된 글 지정
        if (!$post->comments()->save($comment)) { //save: 엘로퀀트 모델 인스턴스를 인자로 받는다
            return with([
                'msg' => '댓글 작성에 실패했습니다. 다시 시도해주세요',
                'result' => 'f'
            ]);
        }

        return with([
           'result' => 's'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    // 댓글 수정
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    // 댓글 삭제
    public function destroy(Comment $comment)
    {
        //
    }
}
