<?php

namespace App\Policies;

use App\Models\User;
use Spatie\Activitylog\Models\Activity;

class ActivitylogPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_activitylog');
    }

    public function view(User $user, Activity $activity): bool
    {
        return $user->can('view_activitylog');
    }

    public function create(User $user): bool
    {
        return $user->can('create_activitylog');
    }

    public function update(User $user, Activity $activity): bool
    {
        return $user->can('update_activitylog');
    }

    public function delete(User $user, Activity $activity): bool
    {
        return $user->can('delete_activitylog');
    }

    public function restore(User $user, Activity $activity): bool
    {
        return $user->can('restore_activitylog');
    }

    public function forceDelete(User $user, Activity $activity): bool
    {
        return $user->can('force_delete_activitylog');
    }
}
