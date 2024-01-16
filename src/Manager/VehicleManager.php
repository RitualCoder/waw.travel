<?php

namespace App\Manager;

use App\Entity\Vehicle;
use Plugo\Manager\AbstractManager;

class VehicleManager extends AbstractManager {

    public function find(int $id): mixed {
        return $this->readOne(Vehicle::class, ['id' => $id]);
    }

    public function findOneBy(array $filters): mixed {
        return $this->readOne(Vehicle::class, $filters);
    }

    public function findBy(array $filters = [], array $order = [], int $limit = null, int $offset = null): mixed {
        return $this->readMany(Vehicle::class, $filters, $order, $limit, $offset);
    }

    public function findAll(): mixed {
        return $this->readMany(Vehicle::class);
    }

    public function add(Vehicle $vehicle): \PDOStatement {
        return $this->create(Vehicle::class, [
            'name' => $vehicle->getName(),
            'icon' => $vehicle->getIcon(),
        ]);
    }

    public function edit(Vehicle $vehicle): \PDOStatement {
        return $this->update(Vehicle::class, [
            'name' => $vehicle->getName(),
            'icon' => $vehicle->getIcon(),
        ], $vehicle->getId());
    }

    public function delete(Vehicle $vehicle): \PDOStatement {
        return $this->remove(Vehicle::class, $vehicle->getId());
    }
}