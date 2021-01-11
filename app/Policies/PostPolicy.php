<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy //Policyクラスでアクセス権限を設定(モデルとセットで作成)
//AuthServiceProviderクラスにセット
// Policyクラスをコントローラやrouteで使用するにはauthorizeメソッドやcanを用いる
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        //自分の患者のみ見れる
        if ($user->id === $post->user_id) {
            return true;
        }
        if ($user->userHasPermission('read-patient')) {
            return true;
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        // if ($user->userHasPermission('Create-patient')) {
        //     return true;
        // }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        //ownerのみがpostをupdateできるようにする
        if ($user->id === $post->user_id) {
            return true;
        }
        if ($user->userHasPermission('edit-patient')) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {

        if ($user->id === $post->user_id) {
            return true;
        }
        if ($user->userHasPermission('delete-patient')) {
            return true;
        }
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        //
    }
}
