<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210705075253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ennemy (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, hp_current INT NOT NULL, action_time INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE game ADD ennemy_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318C58B98B55 FOREIGN KEY (ennemy_id) REFERENCES ennemy (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_232B318C58B98B55 ON game (ennemy_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE game DROP FOREIGN KEY FK_232B318C58B98B55');
        $this->addSql('DROP TABLE ennemy');
        $this->addSql('DROP INDEX UNIQ_232B318C58B98B55 ON game');
        $this->addSql('ALTER TABLE game DROP ennemy_id');
    }
}
