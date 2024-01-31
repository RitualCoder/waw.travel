<?php

namespace App\Manager;

use App\Entity\User;
use Plugo\Manager\AbstractManager;
use App\Manager\RoadtripManager;
use App\Manager\ImageManager;
use Plugo\Services\upload\ServiceImage;

class UserManager extends AbstractManager
{

    public function find(int $id): mixed
    {
        return $this->readOne(User::class, ['id' => $id]);
    }

    public function findOneBy(array $filters): mixed
    {
        return $this->readOne(User::class, $filters);
    }

    public function findBy(array $filters = [], array $order = [], int $limit = null, int $offset = null): mixed
    {
        return $this->readMany(User::class, $filters, $order, $limit, $offset);
    }

    public function findAll(): mixed
    {
        return $this->readMany(User::class);
    }

    public function add(User $user): \PDOStatement
    {
        return $this->create(User::class, [
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'email' => $user->getEmail(),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function editUsername(User $user): \PDOStatement
    {
        return $this->update(User::class, [
            'username' => $user->getUsername(),
        ], $user->getId());
    }

    public function editEmail(User $user): \PDOStatement
    {
        return $this->update(User::class, [
            'email' => $user->getEmail(),
        ], $user->getId());
    }

    public function editPassword(User $user): \PDOStatement
    {
        return $this->update(User::class, [
            'password' => $user->getPassword(),
        ], $user->getId());
    }

    public function edit(User $user): \PDOStatement
    {
        return $this->update(User::class, [
            'username' => $user->getUsername(),
            'password' => $user->getPassword(),
            'email' => $user->getEmail(),
        ], $user->getId());
    }

    public function delete(User $user): \PDOStatement
    {
        // Delete all roadtrips with their images
        $roadtripManager = new RoadtripManager();
        $uploadImage = new ServiceImage();
        $roadtrips = $roadtripManager->findBy(['user_id' => $user->getId()]);
        foreach ($roadtrips as $roadtrip) {
            $imageManager = new ImageManager();
            $images = $imageManager->findBy(['id' => $roadtrip->getImage_id()]);
            foreach ($images as $image) {
                $uploadImage->delete($image->getFilepath());
                $imageManager->delete($image);
            }
        }
        return $this->remove(User::class, $user->getId());
    }
}
