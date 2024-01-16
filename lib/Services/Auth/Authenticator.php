<?php

namespace Plugo\Services\Auth;

class Authenticator

{
    public function login(int $id): void
    {
        $_SESSION['id'] = $id;
    }

    public function logout(): void
    {
        unset($_SESSION['id']);
    }

    public function isLoggedIn(): bool
    {
        return isset($_SESSION['id']);
    }
}
