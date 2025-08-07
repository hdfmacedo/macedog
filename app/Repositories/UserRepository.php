<?php
namespace App\Repositories;

/**
 * Simple repository for handling user verification.
 */
class UserRepository
{
    private const PASSWORD = 'admin';

    /**
     * Verify if given password matches stored password.
     */
    public function verifyPassword(string $password): bool
    {
        return $password === self::PASSWORD;
    }
}
