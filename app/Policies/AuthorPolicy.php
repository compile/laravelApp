<?php

namespace App\Policies;

use App\User;
use App\Models\Author;

class AuthorPolicy extends Policy
{
    public function update(User $user, Author $author)
    {
        // return $author->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Author $author)
    {
        return true;
    }
}
