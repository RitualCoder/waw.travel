<?php

namespace App\Entity;

class Vehicle
{
    private ?int $id;
    private ?string $name;
    private ?string $icon;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }
    
    public function setIcon(string $icon): void
    {
        $this->icon = $icon;
    }
}
