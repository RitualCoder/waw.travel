<?php

namespace App\Manager;

use App\Entity\Image;
use Plugo\Manager\AbstractManager;

class ImageManager extends AbstractManager {

    public function find(int $id): mixed {
        return $this->readOne(Image::class, ['id' => $id]);
    }

    public function findOneBy(array $filters): mixed {
        return $this->readOne(Image::class, $filters);
    }

    public function findBy(array $filters = [], array $order = [], int $limit = null, int $offset = null): mixed {
        return $this->readMany(Image::class, $filters, $order, $limit, $offset);
    }

    public function findAll(): mixed {
        return $this->readMany(Image::class);
    }

    public function add(Image $image): \PDOStatement {
        return $this->create(Image::class, [
            'filePath' => $image->getFilePath(),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function delete(Image $image): \PDOStatement {
        return $this->remove(Image::class, $image->getId());
    }
}