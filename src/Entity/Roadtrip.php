<?php

namespace App\Entity;

use App\Manager\UserManager;
use App\Manager\VehicleManager;
use App\Manager\ImageManager;
use Plugo\Services\Security\Security;

class Roadtrip extends Security
{
    private ?int $id;
    private ?string $name;
    private ?int $user_id;
    private ?int $vehicle_id;
    private ?int $image_id;

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

    public function getUser(): ?object
    {
        $manager = new UserManager();
        return $manager->find($this->user_id);
    }

    public function setUser(int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getVehicle(): ?object
    {
        $manager = new VehicleManager();
        return $manager->find($this->vehicle_id);
    }

    public function setVehicle(int $vehicle_id): void
    {
        $this->vehicle_id = $vehicle_id;
    }

    public function getImage(): ?object
    {
        $manager = new ImageManager();
        return $manager->find($this->image_id);
    }

    public function setImage(int $image_id): void
    {
        $this->image_id = $image_id;
    }
}
