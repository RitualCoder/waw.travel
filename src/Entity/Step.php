<?php

namespace App\Entity;



class Step {

    private ?int $id;
    private ?string $name;
    private ?int $number;
    private ?string $coordinates;
    private ?string $date_departure;
    private ?string $date_arrival;
    private ?int $roadtrip_id;

    public function getId(): ?int {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getNumber(): ?int {
        return $this->number;
    }

    public function setNumber(int $number): void {
        $this->number = $number;
    }

    public function getCoordinates(): ?string {
        return $this->coordinates;
    }

    public function setCoordinates(string $coordinates): void {
        $this->coordinates = $coordinates;
    }

    public function getDate_departure(): ?string {
        return $this->date_departure;
    }

    public function setDate_departure(string $date_departure): void {
        $this->date_departure = $date_departure;
    }

    public function getDate_arrival(): ?string {
        return $this->date_arrival;
    }

    public function setDate_arrival(string $date_arrival): void {
        $this->date_arrival = $date_arrival;
    }

    public function getRoadtrip(): ?int {
        return $this->roadtrip_id;
    }

    public function setRoadtrip(int $roadtrip_id): void {
        $this->roadtrip_id = $roadtrip_id;
    }
}