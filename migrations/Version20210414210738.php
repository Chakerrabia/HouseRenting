<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210414210738 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire ADD maison_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC9D67D8AF FOREIGN KEY (maison_id) REFERENCES maison (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_67F068BC9D67D8AF ON commentaire (maison_id)');
        $this->addSql('ALTER TABLE maison DROP CONSTRAINT fk_f90cb66dba9cd190');
        $this->addSql('DROP INDEX idx_f90cb66dba9cd190');
        $this->addSql('ALTER TABLE maison DROP commentaire_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE maison ADD commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE maison ADD CONSTRAINT fk_f90cb66dba9cd190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_f90cb66dba9cd190 ON maison (commentaire_id)');
        $this->addSql('ALTER TABLE commentaire DROP CONSTRAINT FK_67F068BC9D67D8AF');
        $this->addSql('DROP INDEX IDX_67F068BC9D67D8AF');
        $this->addSql('ALTER TABLE commentaire DROP maison_id');
    }
}
