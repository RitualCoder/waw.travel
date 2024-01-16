<?php

namespace App\Entity;

use Plugo\Services\Security\Security;

class Image extends Security
{
    private ?int $id;
    private ?string $filepath;
    private ?string $created_at;

    // Getters and Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilepath(): ?string
    {
        return $this->filepath;
    }

    public function setFilepath(string $filepath): self
    {
        $this->filepath = $filepath;

        return $this;
    }

    public function getCreated_at(): ?string
    {
        return $this->created_at;
    }
}
