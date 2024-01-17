<?php

namespace App\Manager;

use App\Entity\Roadtrip;
use Plugo\Manager\AbstractManager;

class RoadtripManager extends AbstractManager {

    public function find(int $id): mixed {
        return $this->readOne(Roadtrip::class, ['id' => $id]);
    }

    public function findOneBy(array $filters): mixed {
        return $this->readOne(Roadtrip::class, $filters);
    }

    public function findBy(array $filters = [], array $order = [], int $limit = null, int $offset = null): mixed {
        return $this->readMany(Roadtrip::class, $filters, $order, $limit, $offset);
    }

    public function findAll(): mixed {
        return $this->readMany(Roadtrip::class);
    }

    public function add(Roadtrip $roadtrip): \PDOStatement {
        return $this->create(Roadtrip::class, [
            'name' => $roadtrip->getName(),
            'user_id' => $roadtrip->getUser_id(),
            'vehicle_id' => $roadtrip->getVehicle_id(),
            'image_id' => $roadtrip->getImage_id(),
        ]);
    }

    public function edit(Roadtrip $roadtrip): \PDOStatement {
        return $this->update(Roadtrip::class, [
            'name' => $roadtrip->getName(),
            'user_id' => $roadtrip->getUser_id(),
            'vehicle_id' => $roadtrip->getVehicle_id(),
            'image_id' => $roadtrip->getImage_id(),
        ], $roadtrip->getId());
    }

    public function delete(Roadtrip $roadtrip): \PDOStatement {
        return $this->remove(Roadtrip::class, $roadtrip->getId());
    }
}