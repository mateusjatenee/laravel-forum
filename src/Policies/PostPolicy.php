<?php

namespace App\Policies;

use Riari\Forum\Models\Post;

class PostPolicy
{
    /**
     * Permission: View post.
     *
     * @param  object  $user
     * @param  Post  $post
     * @return bool
     */
    public function show($user, Post $post)
    {
        return true;
    }

    /**
     * Permission: Update post.
     *
     * @param  object  $user
     * @param  Post  $post
     * @return bool
     */
    public function update($user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    /**
     * Permission: Delete post.
     *
     * @param  object  $user
     * @param  Post  $post
     * @return bool
     */
    public function delete($user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}