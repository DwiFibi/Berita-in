<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Author;

class AuthorPolicy
{
    public function view(User $user, Author $author): bool
    {
        return $user->hasRole('admin') || $user->id === $author->user_id;
    }

    public function update(User $user, Author $author): bool
    {
        return $user->hasRole('admin') || $user->id === $author->user_id;
    }

    public function delete(User $user, Author $author): bool
    {
        return $user->hasRole('admin');
    }

    public function create(User $user): bool
    {
        return $user->hasRole('admin') || $user->hasRole('author');
    }

    public function viewAny(User $user): bool
    {
        return $user->hasRole('admin');
    }
}
