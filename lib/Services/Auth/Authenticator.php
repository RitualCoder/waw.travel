<?php

namespace Plugo\Services\Auth;

class Authenticator

{
    public function login(string $username, string $password, string $email): void
    {
        $_SESSION['user'] = [
            'username' => $username,
            'password' => $password,
            'email' => $email,
        ];
    }

    public function logout(): void
    {
        unset($_SESSION['user']);
    }

    public function isLoggedIn(): bool
    {
        return isset($_SESSION['user']);
    }
}
