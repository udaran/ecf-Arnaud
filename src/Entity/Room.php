<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RoomRepository")
 */
class Room
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=80)
     */
    private $number;

    /**
     * @ORM\Column(type="integer")
     */
    private $tariff;

    /**
     * @ORM\Column(type="integer")
     */
    private $capacity;

    /**
     * @ORM\Column(type="integer")
     */
    private $idHotel;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Registration", mappedBy="idRoom")
     */
    private $registrations;

    public function __construct()
    {
        $this->registrations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getTariff(): ?int
    {
        return $this->tariff;
    }

    public function setTariff(int $tariff): self
    {
        $this->tariff = $tariff;

        return $this;
    }

    public function getCapacity(): ?int
    {
        return $this->capacity;
    }

    public function setCapacity(int $capacity): self
    {
        $this->capacity = $capacity;

        return $this;
    }

    public function getIdHotel(): ?int
    {
        return $this->idHotel;
    }

    public function setIdHotel(int $idHotel): self
    {
        $this->idHotel = $idHotel;

        return $this;
    }

    /**
     * @return Collection|Registration[]
     */
    public function getStartDate(): Collection
    {
        return $this->start_date;
    }

    public function addStartDate(Registration $startDate): self
    {
        if (!$this->start_date->contains($startDate)) {
            $this->start_date[] = $startDate;
            $startDate->setIdRoom($this);
        }

        return $this;
    }

    public function removeStartDate(Registration $startDate): self
    {
        if ($this->start_date->contains($startDate)) {
            $this->start_date->removeElement($startDate);
            // set the owning side to null (unless already changed)
            if ($startDate->getIdRoom() === $this) {
                $startDate->setIdRoom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Registration[]
     */
    public function getRegistrations(): Collection
    {
        return $this->registrations;
    }

    public function addRegistration(Registration $registration): self
    {
        if (!$this->registrations->contains($registration)) {
            $this->registrations[] = $registration;
            $registration->setIdRoom($this);
        }

        return $this;
    }

    public function removeRegistration(Registration $registration): self
    {
        if ($this->registrations->contains($registration)) {
            $this->registrations->removeElement($registration);
            // set the owning side to null (unless already changed)
            if ($registration->getIdRoom() === $this) {
                $registration->setIdRoom(null);
            }
        }

        return $this;
    }
}
