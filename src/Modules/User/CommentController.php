<?php

namespace App\Modules\User;

use App\ApplicationBase\Router\Attributes\Controller;
use App\ApplicationBase\Router\Attributes\Delete;
use App\ApplicationBase\Router\Attributes\Get;
use App\ApplicationBase\Router\Attributes\Post;
use App\ApplicationBase\Router\Attributes\Put;

#[Controller('users/:userId/posts/:postId/comments')]
readonly class CommentController
{
    #[Get]
    public function index()
    {

    }

    #[Get(':commentId')]
    public function show()
    {

    }

    #[Post]
    public function create()
    {

    }

    #[Put(':commentId')]
    public function update()
    {

    }

    #[Delete(':commentId')]
    public function delete()
    {

    }
}