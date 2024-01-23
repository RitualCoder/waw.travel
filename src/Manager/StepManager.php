<?php

namespace App\Manager;

use App\Entity\Step;
use Plugo\Manager\AbstractManager;

class StepManager extends AbstractManager {

    public function find(int $id): mixed {
        return $this->readOne(Step::class, ['id' => $id]);
    }

    public function findOneBy(array $filters): mixed {
        return $this->readOne(Step::class, $filters);
    }

    public function findBy(array $filters = [], array $order = [], int $limit = null, int $offset = null): mixed {
        return $this->readMany(Step::class, $filters, $order, $limit, $offset);
    }

    public function findAll(): mixed {
        return $this->readMany(Step::class);
    }

    public function add(Step $step): \PDOStatement {
        return $this->create(Step::class, [
            'name' => $step->getName(),
            'number' => $step->getNumber(),
            'latitude' => $step->getLatitude(),
            'longitude' => $step->getLongitude(),
            'date_departure' => $step->getDate_departure(),
            'date_arrival' => $step->getDate_arrival(),
            'roadtrip_id' => $step->getRoadtrip_id(),
        ]);
    }

    public function edit(Step $step): \PDOStatement {
        return $this->update(Step::class, [
            'name' => $step->getName(),
            'number' => $step->getNumber(),
            'latitude' => $step->getLatitude(),
            'longitude' => $step->getLongitude(),
            'date_departure' => $step->getDate_departure(),
            'date_arrival' => $step->getDate_arrival(),
            'roadtrip_id' => $step->getRoadtrip_id(),
        ], $step->getId());
    }

    public function delete(Step $step): \PDOStatement {
        return $this->remove(Step::class, $step->getId());
    }
}