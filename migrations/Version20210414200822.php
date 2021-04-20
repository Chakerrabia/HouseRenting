<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210414200822 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartement ADD photo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE appartement ADD commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE appartement ADD CONSTRAINT FK_71A6BD8D7E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE appartement ADD CONSTRAINT FK_71A6BD8DBA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_71A6BD8D7E9E4C8C ON appartement (photo_id)');
        $this->addSql('CREATE INDEX IDX_71A6BD8DBA9CD190 ON appartement (commentaire_id)');
        $this->addSql('ALTER TABLE commentaire DROP CONSTRAINT fk_67f068bce1729bba');
        $this->addSql('ALTER TABLE commentaire DROP CONSTRAINT fk_67f068bcc4fff555');
        $this->addSql('ALTER TABLE commentaire DROP CONSTRAINT fk_67f068bc9d67d8af');
        $this->addSql('ALTER TABLE commentaire DROP CONSTRAINT fk_67f068bc446f285f');
        $this->addSql('ALTER TABLE commentaire DROP CONSTRAINT fk_67f068bc8a2d8b41');
        $this->addSql('DROP INDEX idx_67f068bc9d67d8af');
        $this->addSql('DROP INDEX idx_67f068bce1729bba');
        $this->addSql('DROP INDEX idx_67f068bc8a2d8b41');
        $this->addSql('DROP INDEX idx_67f068bc446f285f');
        $this->addSql('DROP INDEX idx_67f068bcc4fff555');
        $this->addSql('ALTER TABLE commentaire DROP appartement_id');
        $this->addSql('ALTER TABLE commentaire DROP garage_id');
        $this->addSql('ALTER TABLE commentaire DROP maison_id');
        $this->addSql('ALTER TABLE commentaire DROP studio_id');
        $this->addSql('ALTER TABLE commentaire DROP terrain_id');
        $this->addSql('ALTER TABLE garage ADD photo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE garage ADD commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610B7E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610BBA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9F26610B7E9E4C8C ON garage (photo_id)');
        $this->addSql('CREATE INDEX IDX_9F26610BBA9CD190 ON garage (commentaire_id)');
        $this->addSql('ALTER TABLE maison ADD photo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE maison ADD commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE maison ADD CONSTRAINT FK_F90CB66D7E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE maison ADD CONSTRAINT FK_F90CB66DBA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_F90CB66D7E9E4C8C ON maison (photo_id)');
        $this->addSql('CREATE INDEX IDX_F90CB66DBA9CD190 ON maison (commentaire_id)');
        $this->addSql('ALTER TABLE photo DROP CONSTRAINT fk_14b78418e1729bba');
        $this->addSql('ALTER TABLE photo DROP CONSTRAINT fk_14b78418c4fff555');
        $this->addSql('ALTER TABLE photo DROP CONSTRAINT fk_14b784189d67d8af');
        $this->addSql('ALTER TABLE photo DROP CONSTRAINT fk_14b78418446f285f');
        $this->addSql('ALTER TABLE photo DROP CONSTRAINT fk_14b784188a2d8b41');
        $this->addSql('DROP INDEX idx_14b784188a2d8b41');
        $this->addSql('DROP INDEX idx_14b78418446f285f');
        $this->addSql('DROP INDEX idx_14b784189d67d8af');
        $this->addSql('DROP INDEX idx_14b78418c4fff555');
        $this->addSql('DROP INDEX idx_14b78418e1729bba');
        $this->addSql('ALTER TABLE photo DROP appartement_id');
        $this->addSql('ALTER TABLE photo DROP garage_id');
        $this->addSql('ALTER TABLE photo DROP maison_id');
        $this->addSql('ALTER TABLE photo DROP studio_id');
        $this->addSql('ALTER TABLE photo DROP terrain_id');
        $this->addSql('ALTER TABLE studio ADD photo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE studio ADD commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE studio ADD CONSTRAINT FK_4A2B07B67E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE studio ADD CONSTRAINT FK_4A2B07B6BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_4A2B07B67E9E4C8C ON studio (photo_id)');
        $this->addSql('CREATE INDEX IDX_4A2B07B6BA9CD190 ON studio (commentaire_id)');
        $this->addSql('ALTER TABLE terrain ADD photo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE terrain ADD commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE terrain ADD CONSTRAINT FK_C87653B17E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE terrain ADD CONSTRAINT FK_C87653B1BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_C87653B17E9E4C8C ON terrain (photo_id)');
        $this->addSql('CREATE INDEX IDX_C87653B1BA9CD190 ON terrain (commentaire_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE maison DROP CONSTRAINT FK_F90CB66D7E9E4C8C');
        $this->addSql('ALTER TABLE maison DROP CONSTRAINT FK_F90CB66DBA9CD190');
        $this->addSql('DROP INDEX IDX_F90CB66D7E9E4C8C');
        $this->addSql('DROP INDEX IDX_F90CB66DBA9CD190');
        $this->addSql('ALTER TABLE maison DROP photo_id');
        $this->addSql('ALTER TABLE maison DROP commentaire_id');
        $this->addSql('ALTER TABLE garage DROP CONSTRAINT FK_9F26610B7E9E4C8C');
        $this->addSql('ALTER TABLE garage DROP CONSTRAINT FK_9F26610BBA9CD190');
        $this->addSql('DROP INDEX IDX_9F26610B7E9E4C8C');
        $this->addSql('DROP INDEX IDX_9F26610BBA9CD190');
        $this->addSql('ALTER TABLE garage DROP photo_id');
        $this->addSql('ALTER TABLE garage DROP commentaire_id');
        $this->addSql('ALTER TABLE studio DROP CONSTRAINT FK_4A2B07B67E9E4C8C');
        $this->addSql('ALTER TABLE studio DROP CONSTRAINT FK_4A2B07B6BA9CD190');
        $this->addSql('DROP INDEX IDX_4A2B07B67E9E4C8C');
        $this->addSql('DROP INDEX IDX_4A2B07B6BA9CD190');
        $this->addSql('ALTER TABLE studio DROP photo_id');
        $this->addSql('ALTER TABLE studio DROP commentaire_id');
        $this->addSql('ALTER TABLE terrain DROP CONSTRAINT FK_C87653B17E9E4C8C');
        $this->addSql('ALTER TABLE terrain DROP CONSTRAINT FK_C87653B1BA9CD190');
        $this->addSql('DROP INDEX IDX_C87653B17E9E4C8C');
        $this->addSql('DROP INDEX IDX_C87653B1BA9CD190');
        $this->addSql('ALTER TABLE terrain DROP photo_id');
        $this->addSql('ALTER TABLE terrain DROP commentaire_id');
        $this->addSql('ALTER TABLE photo ADD appartement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD garage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD maison_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD studio_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD terrain_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT fk_14b78418e1729bba FOREIGN KEY (appartement_id) REFERENCES appartement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT fk_14b78418c4fff555 FOREIGN KEY (garage_id) REFERENCES garage (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT fk_14b784189d67d8af FOREIGN KEY (maison_id) REFERENCES maison (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT fk_14b78418446f285f FOREIGN KEY (studio_id) REFERENCES studio (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT fk_14b784188a2d8b41 FOREIGN KEY (terrain_id) REFERENCES terrain (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_14b784188a2d8b41 ON photo (terrain_id)');
        $this->addSql('CREATE INDEX idx_14b78418446f285f ON photo (studio_id)');
        $this->addSql('CREATE INDEX idx_14b784189d67d8af ON photo (maison_id)');
        $this->addSql('CREATE INDEX idx_14b78418c4fff555 ON photo (garage_id)');
        $this->addSql('CREATE INDEX idx_14b78418e1729bba ON photo (appartement_id)');
        $this->addSql('ALTER TABLE commentaire ADD appartement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD garage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD maison_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD studio_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD terrain_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT fk_67f068bce1729bba FOREIGN KEY (appartement_id) REFERENCES appartement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT fk_67f068bcc4fff555 FOREIGN KEY (garage_id) REFERENCES garage (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT fk_67f068bc9d67d8af FOREIGN KEY (maison_id) REFERENCES maison (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT fk_67f068bc446f285f FOREIGN KEY (studio_id) REFERENCES studio (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT fk_67f068bc8a2d8b41 FOREIGN KEY (terrain_id) REFERENCES terrain (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_67f068bc9d67d8af ON commentaire (maison_id)');
        $this->addSql('CREATE INDEX idx_67f068bce1729bba ON commentaire (appartement_id)');
        $this->addSql('CREATE INDEX idx_67f068bc8a2d8b41 ON commentaire (terrain_id)');
        $this->addSql('CREATE INDEX idx_67f068bc446f285f ON commentaire (studio_id)');
        $this->addSql('CREATE INDEX idx_67f068bcc4fff555 ON commentaire (garage_id)');
        $this->addSql('ALTER TABLE appartement DROP CONSTRAINT FK_71A6BD8D7E9E4C8C');
        $this->addSql('ALTER TABLE appartement DROP CONSTRAINT FK_71A6BD8DBA9CD190');
        $this->addSql('DROP INDEX IDX_71A6BD8D7E9E4C8C');
        $this->addSql('DROP INDEX IDX_71A6BD8DBA9CD190');
        $this->addSql('ALTER TABLE appartement DROP photo_id');
        $this->addSql('ALTER TABLE appartement DROP commentaire_id');
    }
}
