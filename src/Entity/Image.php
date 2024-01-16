<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image
{
    private $id;
    private $filePath;
    private $created_at;

    // Getters and Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    public function setFilePath(string $filePath): self
    {
        $this->filePath = $filePath;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->filePath;
    }

    public function getCreated_at(): ?string
    {
        return $this->created_at;
    }

    public function generateUUID(): string
    {
        return uniqid();
    }
}
