<?php

namespace App\Policies;

use App\User;
use App\Models\Work;

class WorkPolicy extends Policy
{
    public function update(User $user, Work $work)
    {
        // return $work->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Work $work)
    {
        return true;
    }
}
