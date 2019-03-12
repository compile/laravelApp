<?php

namespace App\Policies;

use App\User;
use App\Models\Thumb;

class ThumbPolicy extends Policy
{
    public function update(User $user, Thumb $thumb)
    {
        // return $thumb->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Thumb $thumb)
    {
        return true;
    }
}
