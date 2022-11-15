<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221111224546 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE place DROP CONSTRAINT fk_741d53cd3da5256d');
        $this->addSql('DROP SEQUENCE dossier_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE image_id_seq CASCADE');
        $this->addSql('ALTER TABLE dossier DROP CONSTRAINT fk_3d48e037da6a219');
        $this->addSql('DROP TABLE dossier');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP INDEX uniq_741d53cd3da5256d');
        $this->addSql('ALTER TABLE place DROP image_id');
        $this->addSql('ALTER TABLE users ADD avis_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD place_id INT NOT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9197E709F FOREIGN KEY (avis_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9DA6A219 FOREIGN KEY (place_id) REFERENCES place (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9197E709F ON users (avis_id)');
        $this->addSql('CREATE INDEX IDX_1483A5E9DA6A219 ON users (place_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE dossier_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE image_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE dossier (id INT NOT NULL, place_id INT NOT NULL, last_name VARCHAR(100) NOT NULL, first_name VARCHAR(100) NOT NULL, car_type VARCHAR(100) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_3d48e037da6a219 ON dossier (place_id)');
        $this->addSql('CREATE TABLE image (id INT NOT NULL, image_id VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE dossier ADD CONSTRAINT fk_3d48e037da6a219 FOREIGN KEY (place_id) REFERENCES place (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE place ADD image_id INT NOT NULL');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT fk_741d53cd3da5256d FOREIGN KEY (image_id) REFERENCES image (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_741d53cd3da5256d ON place (image_id)');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT FK_1483A5E9197E709F');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT FK_1483A5E9DA6A219');
        $this->addSql('DROP INDEX UNIQ_1483A5E9197E709F');
        $this->addSql('DROP INDEX IDX_1483A5E9DA6A219');
        $this->addSql('ALTER TABLE users DROP avis_id');
        $this->addSql('ALTER TABLE users DROP place_id');
    }
}
