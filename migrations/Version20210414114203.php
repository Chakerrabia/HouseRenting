<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210414114203 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE commentaire_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE commentaire (id INT NOT NULL, comm TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE appartement ADD commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE appartement ADD CONSTRAINT FK_71A6BD8DBA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_71A6BD8DBA9CD190 ON appartement (commentaire_id)');
        $this->addSql('ALTER TABLE garage ADD commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610BBA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9F26610BBA9CD190 ON garage (commentaire_id)');
        $this->addSql('ALTER TABLE maison ADD commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE maison ADD CONSTRAINT FK_F90CB66DBA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_F90CB66DBA9CD190 ON maison (commentaire_id)');
        $this->addSql('ALTER TABLE studio ADD commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE studio ADD CONSTRAINT FK_4A2B07B6BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_4A2B07B6BA9CD190 ON studio (commentaire_id)');
        $this->addSql('ALTER TABLE terrain ADD commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE terrain ADD CONSTRAINT FK_C87653B1BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_C87653B1BA9CD190 ON terrain (commentaire_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE appartement DROP CONSTRAINT FK_71A6BD8DBA9CD190');
        $this->addSql('ALTER TABLE garage DROP CONSTRAINT FK_9F26610BBA9CD190');
        $this->addSql('ALTER TABLE maison DROP CONSTRAINT FK_F90CB66DBA9CD190');
        $this->addSql('ALTER TABLE studio DROP CONSTRAINT FK_4A2B07B6BA9CD190');
        $this->addSql('ALTER TABLE terrain DROP CONSTRAINT FK_C87653B1BA9CD190');
        $this->addSql('DROP SEQUENCE commentaire_id_seq CASCADE');
        $this->addSql('DROP TABLE commentaire');
        $this->addSql('DROP INDEX IDX_F90CB66DBA9CD190');
        $this->addSql('ALTER TABLE maison DROP commentaire_id');
        $this->addSql('DROP INDEX IDX_71A6BD8DBA9CD190');
        $this->addSql('ALTER TABLE appartement DROP commentaire_id');
        $this->addSql('DROP INDEX IDX_9F26610BBA9CD190');
        $this->addSql('ALTER TABLE garage DROP commentaire_id');
        $this->addSql('DROP INDEX IDX_4A2B07B6BA9CD190');
        $this->addSql('ALTER TABLE studio DROP commentaire_id');
        $this->addSql('DROP INDEX IDX_C87653B1BA9CD190');
        $this->addSql('ALTER TABLE terrain DROP commentaire_id');
    }
}
