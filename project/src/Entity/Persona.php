<?php

namespace App\Entity;

use App\Repository\PersonaRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonaRepository::class)
 */
class Persona
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $hp_max;

    /**
     * @ORM\Column(type="integer")
     */
    private $hp_current;

    /**
     * @ORM\Column(type="integer")
     */
    private $pm_max;

    /**
     * @ORM\Column(type="integer")
     */
    private $pm_current;

    /**
     * @ORM\Column(type="integer")
     */
    private $stamina_max;

    /**
     * @ORM\Column(type="integer")
     */
    private $stamina_current;

    /**
     * @ORM\Column(type="integer")
     */
    private $strength;

    /**
     * @ORM\Column(type="integer")
     */
    private $magic;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $water_level;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $max_water_progression_level;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $current_water_level_progression;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $fire_level;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $max_fire_level_progression;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $current_fire_level_progression;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $earth_level;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $max_earth_level_progression;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $current_earth_level_progression;

    /**
     * @ORM\Column(type="integer")
     */
    private $physical_resistance;

    /**
     * @ORM\Column(type="integer")
     */
    private $magic_resistance;

    /**
     * @ORM\Column(type="integer")
     */
    private $initiative;

    /**
     * @ORM\Column(type="integer")
     */
    private $action_time;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHpMax(): ?int
    {
        return $this->hp_max;
    }

    public function setHpMax(int $hp_max): self
    {
        $this->hp_max = $hp_max;

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

    public function getPmMax(): ?int
    {
        return $this->pm_max;
    }

    public function setPmMax(int $pm_max): self
    {
        $this->pm_max = $pm_max;

        return $this;
    }

    public function getPmCurrent(): ?int
    {
        return $this->pm_current;
    }

    public function setPmCurrent(int $pm_current): self
    {
        $this->pm_current = $pm_current;

        return $this;
    }

    public function getStaminaMax(): ?int
    {
        return $this->stamina_max;
    }

    public function setStaminaMax(int $stamina_max): self
    {
        $this->stamina_max = $stamina_max;

        return $this;
    }

    public function getStaminaCurrent(): ?int
    {
        return $this->stamina_current;
    }

    public function setStaminaCurrent(int $stamina_current): self
    {
        $this->stamina_current = $stamina_current;

        return $this;
    }

    public function getStrength(): ?int
    {
        return $this->strength;
    }

    public function setStrength(int $strength): self
    {
        $this->strength = $strength;

        return $this;
    }

    public function getMagic(): ?int
    {
        return $this->magic;
    }

    public function setMagic(int $magic): self
    {
        $this->magic = $magic;

        return $this;
    }

    public function getWaterLevel(): ?int
    {
        return $this->water_level;
    }

    public function setWaterLevel(int $water_level): self
    {
        $this->water_level = $water_level;

        return $this;
    }

    public function getMaxWaterProgressionLevel(): ?int
    {
        return $this->max_water_progression_level;
    }

    public function setMaxWaterProgressionLevel(int $max_water_progression_level): self
    {
        $this->max_water_progression_level = $max_water_progression_level;

        return $this;
    }

    public function getCurrentWaterLevelProgression(): ?int
    {
        return $this->current_water_level_progression;
    }

    public function setCurrentWaterLevelProgression(int $current_water_level_progression): self
    {
        $this->current_water_level_progression = $current_water_level_progression;

        return $this;
    }

    public function getFireLevel(): ?int
    {
        return $this->fire_level;
    }

    public function setFireLevel(int $fire_level): self
    {
        $this->fire_level = $fire_level;

        return $this;
    }

    public function getMaxFireLevelProgression(): ?int
    {
        return $this->max_fire_level_progression;
    }

    public function setMaxFireLevelProgression(int $max_fire_level_progression): self
    {
        $this->max_fire_level_progression = $max_fire_level_progression;

        return $this;
    }

    public function getCurrentFireLevelProgression(): ?int
    {
        return $this->current_fire_level_progression;
    }

    public function setCurrentFireLevelProgression(int $current_fire_level_progression): self
    {
        $this->current_fire_level_progression = $current_fire_level_progression;

        return $this;
    }

    public function getEarthLevel(): ?int
    {
        return $this->earth_level;
    }

    public function setEarthLevel(int $earth_level): self
    {
        $this->earth_level = $earth_level;

        return $this;
    }

    public function getMaxEarthLevelProgression(): ?int
    {
        return $this->max_earth_level_progression;
    }

    public function setMaxEarthLevelProgression(int $max_earth_level_progression): self
    {
        $this->max_earth_level_progression = $max_earth_level_progression;

        return $this;
    }

    public function getCurrentEarthLevelProgression(): ?int
    {
        return $this->current_earth_level_progression;
    }

    public function setCurrentEarthLevelProgression(int $current_earth_level_progression): self
    {
        $this->current_earth_level_progression = $current_earth_level_progression;

        return $this;
    }

    public function getPhysicalResistance(): ?int
    {
        return $this->physical_resistance;
    }

    public function setPhysicalResistance(int $physical_resistance): self
    {
        $this->physical_resistance = $physical_resistance;

        return $this;
    }

    public function getMagicResistance(): ?int
    {
        return $this->magic_resistance;
    }

    public function setMagicResistance(int $magic_resistance): self
    {
        $this->magic_resistance = $magic_resistance;

        return $this;
    }

    public function getInitiative(): ?int
    {
        return $this->initiative;
    }

    public function setInitiative(int $initiative): self
    {
        $this->initiative = $initiative;

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

    public function initialize(): self
    {
        $this->hp_max = 50;
        $this->hp_current = 50;
        $this->pm_max = 20;
        $this->pm_current = 20;
        $this->stamina_max = 30;
        $this->stamina_current  = 30;     
        $this->strength = 10;
        $this->magic = 10;
        $this->water_level = 0;
        $this->max_water_progression_level = 0;
        $this->current_water_level_progression = 0;
        $this->fire_level = 0;
        $this->max_fire_level_progression = 0;
        $this->current_fire_level_progression = 0;
        $this->earth_level = 0;
        $this->max_earth_level_progression = 0;
        $this->current_earth_level_progression = 0;
        $this->physical_resistance = 0;
        $this->magic_resistance = 0;
        $this->initiative = 0;
        $this->action_time = 0;

        return $this;
    }
}
