<?php

namespace App\Entity;

use App\Repository\EnnemyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnnemyRepository::class)
 */
class Ennemy
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\Column(type="integer")
     */
    private $hp_current;

    /**
     * @ORM\Column(type="integer")
     */
    private $action_time;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getHpCurrent(): ?int
    {
        return $this->hp_current;
    }

    public function setHpCurrent(int $hp_current): self
    {
        $this->hp_current = $hp_current;

        return $this;
    }

    public function getActionTime(): ?int
    {
        return $this->action_time;
    }

    public function setActionTime(int $action_time): self
    {
        $this->action_time = $action_time;

        return $this;
    }

    public function initialize(){
        $this->type = "demo";
        $this->hp_current = 60;
        $this->action_time = 0;
    }
}
