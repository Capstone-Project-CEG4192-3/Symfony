<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221112073955 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE avis_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE avis (id INT NOT NULL, advice VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE image ADD name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE place ADD images_id INT NOT NULL');
        $this->addSql('ALTER TABLE place DROP image');
        $this->addSql('ALTER TABLE place ADD CONSTRAINT FK_741D53CDD44F05E5 FOREIGN KEY (images_id) REFERENCES image (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_741D53CDD44F05E5 ON place (images_id)');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT FK_1483A5E9197E709F');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9197E709F FOREIGN KEY (avis_id) REFERENCES avis (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT FK_1483A5E9197E709F');
        $this->addSql('DROP SEQUENCE avis_id_seq CASCADE');
        $this->addSql('DROP TABLE avis');
        $this->addSql('ALTER TABLE users DROP CONSTRAINT fk_1483a5e9197e709f');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT fk_1483a5e9197e709f FOREIGN KEY (avis_id) REFERENCES users (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE place DROP CONSTRAINT FK_741D53CDD44F05E5');
        $this->addSql('DROP INDEX UNIQ_741D53CDD44F05E5');
        $this->addSql('ALTER TABLE place ADD image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE place DROP images_id');
        $this->addSql('ALTER TABLE image DROP name');
    }
}
