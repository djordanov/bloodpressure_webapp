<?php

namespace App\Entity;

use App\Repository\BloodPressureObservationRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BloodPressureObservationRepository::class)]
class BloodPressureObservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime', name: 'observation_time')]
    private $observationTime;

    #[ORM\Column(type: 'integer')]
    private $systolic;

    #[ORM\Column(type: 'integer')]
    private $diastolic;

    #[ORM\Column(type: 'integer')]
    private $pulse;

    #[ORM\Column(type: 'text', nullable: true)]
    private $comment;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObservationTime(): ?DateTimeInterface
    {
        return $this->observationTime;
    }

    public function setObservationTime(DateTimeInterface $observationTime): self
    {
        $this->observationTime = $observationTime;

        return $this;
    }

    public function getSystolic(): ?int
    {
        return $this->systolic;
    }

    public function setSystolic(int $systolic): self
    {
        $this->systolic = $systolic;

        return $this;
    }

    public function getDiastolic(): ?int
    {
        return $this->diastolic;
    }

    public function setDiastolic(int $diastolic): self
    {
        $this->diastolic = $diastolic;

        return $this;
    }

    public function getPulse(): ?int
    {
        return $this->pulse;
    }

    public function setPulse(int $pulse): self
    {
        $this->pulse = $pulse;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function toJson() {
        return json_encode([
            'id' => $this->id,
            'observationTime' => $this->observationTime,
            'systolic' => $this->systolic,
            'diastolic' => $this->diastolic,
            'pulse' => $this->pulse,
            'comment' => $this->comment
        ]);
    }
}
