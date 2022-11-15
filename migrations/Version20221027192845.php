<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221027192845 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE users DROP CONSTRAINT fk_1483a5e9197e709f');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT fk_1483a5e9611c0c56');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT fk_1483a5e9da6a219');
        $this->addSql('DROP INDEX idx_1483a5e9da6a219');
        $this->addSql('DROP INDEX uniq_1483a5e9611c0c56');
        $this->addSql('DROP INDEX uniq_1483a5e9197e709f');
        $this->addSql('ALTER TABLE users DROP avis_id');
        $this->addSql('ALTER TABLE users DROP dossier_id');
        $this->addSql('ALTER TABLE users DROP place_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE users ADD avis_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD dossier_id INT NOT NULL');
        $this->addSql('ALTER TABLE users ADD place_id INT NOT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT fk_1483a5e9197e709f FOREIGN KEY (avis_id) REFERENCES avis (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT fk_1483a5e9611c0c56 FOREIGN KEY (dossier_id) REFERENCES dossier (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT fk_1483a5e9da6a219 FOREIGN KEY (place_id) REFERENCES place (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_1483a5e9da6a219 ON users (place_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_1483a5e9611c0c56 ON users (dossier_id)');
        $this->addSql('CREATE UNIQUE INDEX uniq_1483a5e9197e709f ON users (avis_id)');
    }
}
