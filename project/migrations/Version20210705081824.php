<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210705081824 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE persona (id INT AUTO_INCREMENT NOT NULL, hp_max INT NOT NULL, hp_current INT NOT NULL, pm_max INT NOT NULL, pm_current INT NOT NULL, stamina_max INT NOT NULL, stamina_current INT NOT NULL, strength INT NOT NULL, magic INT NOT NULL, water_level INT DEFAULT NULL, max_water_progression_level INT DEFAULT NULL, current_water_level_progression INT DEFAULT NULL, fire_level INT DEFAULT NULL, max_fire_level_progression INT DEFAULT NULL, current_fire_level_progression INT DEFAULT NULL, earth_level INT DEFAULT NULL, max_earth_level_progression INT DEFAULT NULL, current_earth_level_progression INT DEFAULT NULL, physical_resistance INT NOT NULL, magic_resistance INT NOT NULL, initiative INT NOT NULL, action_time INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE game ADD persona_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CF5F88DB9 FOREIGN KEY (persona_id) REFERENCES persona (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_232B318CF5F88DB9 ON game (persona_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318CF5F88DB9');
        $this->addSql('DROP TABLE persona');
        $this->addSql('DROP INDEX UNIQ_232B318CF5F88DB9 ON game');
        $this->addSql('ALTER TABLE game DROP persona_id');
    }
}
