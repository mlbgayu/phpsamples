<?php

namespace App\Policies;

use App\Models\User;
use App\Models\gfygf;
use Illuminate\Auth\Access\HandlesAuthorization;

class gfygfPolicy{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        //
    }

    public function view(User $user, gfygf $gfygf): bool
    {
    }

    public function create(User $user): bool
    {
    }

    public function update(User $user, gfygf $gfygf): bool
    {
    }

    public function delete(User $user, gfygf $gfygf): bool
    {
    }

    public function restore(User $user, gfygf $gfygf): bool
    {
    }

    public function forceDelete(User $user, gfygf $gfygf): bool
    {
    }
}
