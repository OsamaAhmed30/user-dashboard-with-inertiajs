<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\user;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
   
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->email =='osama.ao2026@gmail.com';
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, user $model): bool
    {
        
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, user $model): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, user $model): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, user $model): bool
    {
        //
    }
}
