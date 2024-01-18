<?php

namespace App\Entity;

use Plugo\Services\Security\Security;
use App\Manager\RoadtripManager;

class User extends Security
{

    private ?int $id;
    private ?string $username;
    private ?string $password;
    private ?string $email;
    private ?string $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getCreated_at(): ?string
    {
        return $this->created_at;
    }
    
    public function setCreated_at(string $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getRoadtripsNumber(): int
    {
        $roadtripManager = new RoadtripManager();
        $roadtrips = $roadtripManager->findBy(['user_id' => $this->getId()]);
        return count($roadtrips);
    }
}
