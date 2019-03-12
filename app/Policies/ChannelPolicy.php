<?php

namespace App\Policies;

use App\User;
use App\Models\Channel;

class ChannelPolicy extends Policy
{
    public function update(User $user, Channel $channel)
    {
        // return $channel->user_id == $user->id;
        return true;
    }

    public function destroy(User $user, Channel $channel)
    {
        return true;
    }
}
