<?php

namespace App\Policies;

use App\Product;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class ProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the product.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function view(User $user)
    {
        $roles = $user->roles()->pluck('name');
        return in_array('admin', $roles->toArray());

    }

    /**
     * Determine whether the user can create products.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        $roles = $user->roles()->pluck('name');
        return in_array('admin', $roles->toArray());
    }

    /**
     * Determine whether the user can update the product.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function update(User $user)
    {
        $roles = $user->roles()->pluck('name');
        return in_array('admin', $roles->toArray());
    }

    /**
     * Determine whether the user can delete the product.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function delete(User $user)
    {
        $roles = $user->roles()->pluck('name');
        return in_array('admin', $roles->toArray());
    }
}
