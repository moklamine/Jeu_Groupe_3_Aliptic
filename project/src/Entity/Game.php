<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GameRepository::class)
 */
class Game
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $flag_start_game;

    /**
     * @ORM\Column(type="boolean")
     */
    private $flat_at_campfire;

    /**
     * @ORM\Column(type="boolean")
     */
    private $flag_in_tower;

    /**
     * @ORM\Column(type="boolean")
     */
    private $level_tower;

    /**
     * @ORM\Column(type="boolean")
     */
    private $flat_figth_finished;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="game")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFlagStartGame(): ?bool
    {
        return $this->flag_start_game;
    }

    public function setFlagStartGame(bool $flag_start_game): self
    {
        $this->flag_start_game = $flag_start_game;

        return $this;
    }

    public function getFlatAtCampfire(): ?bool
    {
        return $this->flat_at_campfire;
    }

    public function setFlatAtCampfire(bool $flat_at_campfire): self
    {
        $this->flat_at_campfire = $flat_at_campfire;

        return $this;
    }

    public function getFlagInTower(): ?bool
    {
        return $this->flag_in_tower;
    }

    public function setFlagInTower(bool $flag_in_tower): self
    {
        $this->flag_in_tower = $flag_in_tower;

        return $this;
    }

    public function getLevelTower(): ?bool
    {
        return $this->level_tower;
    }

    public function setLevelTower(bool $level_tower): self
    {
        $this->level_tower = $level_tower;

        return $this;
    }

    public function getFlatFigthFinished(): ?bool
    {
        return $this->flat_figth_finished;
    }

    public function setFlatFigthFinished(bool $flat_figth_finished): self
    {
        $this->flat_figth_finished = $flat_figth_finished;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function initialize(): self
    {
        $this->flag_start_game = false;
        $this->flat_at_campfire = false;
        $this->flag_in_tower = false;
        $this->level_tower = 0;
        $this->flat_figth_finished = false;

        return $this;
    }
}
