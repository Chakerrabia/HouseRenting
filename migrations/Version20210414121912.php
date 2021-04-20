<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210414121912 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE appartement DROP CONSTRAINT fk_71a6bd8d7e9e4c8c');
        $this->addSql('ALTER TABLE appartement DROP CONSTRAINT fk_71a6bd8dba9cd190');
        $this->addSql('DROP INDEX idx_71a6bd8d7e9e4c8c');
        $this->addSql('DROP INDEX idx_71a6bd8dba9cd190');
        $this->addSql('ALTER TABLE appartement DROP photo_id');
        $this->addSql('ALTER TABLE appartement DROP commentaire_id');
        $this->addSql('ALTER TABLE commentaire ADD appartement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD garage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD maison_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD studio_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD terrain_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCE1729BBA FOREIGN KEY (appartement_id) REFERENCES appartement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCC4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC9D67D8AF FOREIGN KEY (maison_id) REFERENCES maison (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC446F285F FOREIGN KEY (studio_id) REFERENCES studio (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC8A2D8B41 FOREIGN KEY (terrain_id) REFERENCES terrain (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_67F068BCE1729BBA ON commentaire (appartement_id)');
        $this->addSql('CREATE INDEX IDX_67F068BCC4FFF555 ON commentaire (garage_id)');
        $this->addSql('CREATE INDEX IDX_67F068BC9D67D8AF ON commentaire (maison_id)');
        $this->addSql('CREATE INDEX IDX_67F068BC446F285F ON commentaire (studio_id)');
        $this->addSql('CREATE INDEX IDX_67F068BC8A2D8B41 ON commentaire (terrain_id)');
        $this->addSql('ALTER TABLE garage DROP CONSTRAINT fk_9f26610b7e9e4c8c');
        $this->addSql('ALTER TABLE garage DROP CONSTRAINT fk_9f26610bba9cd190');
        $this->addSql('DROP INDEX idx_9f26610b7e9e4c8c');
        $this->addSql('DROP INDEX idx_9f26610bba9cd190');
        $this->addSql('ALTER TABLE garage DROP photo_id');
        $this->addSql('ALTER TABLE garage DROP commentaire_id');
        $this->addSql('ALTER TABLE maison DROP CONSTRAINT fk_f90cb66dba9cd190');
        $this->addSql('DROP INDEX idx_f90cb66dba9cd190');
        $this->addSql('ALTER TABLE maison DROP commentaire_id');
        $this->addSql('ALTER TABLE photo ADD appartement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD garage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD maison_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD studio_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD terrain_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418E1729BBA FOREIGN KEY (appartement_id) REFERENCES appartement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418C4FFF555 FOREIGN KEY (garage_id) REFERENCES garage (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784189D67D8AF FOREIGN KEY (maison_id) REFERENCES maison (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B78418446F285F FOREIGN KEY (studio_id) REFERENCES studio (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784188A2D8B41 FOREIGN KEY (terrain_id) REFERENCES terrain (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_14B78418E1729BBA ON photo (appartement_id)');
        $this->addSql('CREATE INDEX IDX_14B78418C4FFF555 ON photo (garage_id)');
        $this->addSql('CREATE INDEX IDX_14B784189D67D8AF ON photo (maison_id)');
        $this->addSql('CREATE INDEX IDX_14B78418446F285F ON photo (studio_id)');
        $this->addSql('CREATE INDEX IDX_14B784188A2D8B41 ON photo (terrain_id)');
        $this->addSql('ALTER TABLE studio DROP CONSTRAINT fk_4a2b07b67e9e4c8c');
        $this->addSql('ALTER TABLE studio DROP CONSTRAINT fk_4a2b07b6ba9cd190');
        $this->addSql('DROP INDEX idx_4a2b07b6ba9cd190');
        $this->addSql('DROP INDEX idx_4a2b07b67e9e4c8c');
        $this->addSql('ALTER TABLE studio DROP photo_id');
        $this->addSql('ALTER TABLE studio DROP commentaire_id');
        $this->addSql('ALTER TABLE terrain DROP CONSTRAINT fk_c87653b17e9e4c8c');
        $this->addSql('ALTER TABLE terrain DROP CONSTRAINT fk_c87653b1ba9cd190');
        $this->addSql('DROP INDEX idx_c87653b1ba9cd190');
        $this->addSql('DROP INDEX idx_c87653b17e9e4c8c');
        $this->addSql('ALTER TABLE terrain DROP photo_id');
        $this->addSql('ALTER TABLE terrain DROP commentaire_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE maison ADD commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE maison ADD CONSTRAINT fk_f90cb66dba9cd190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_f90cb66dba9cd190 ON maison (commentaire_id)');
        $this->addSql('ALTER TABLE appartement ADD photo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE appartement ADD commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE appartement ADD CONSTRAINT fk_71a6bd8d7e9e4c8c FOREIGN KEY (photo_id) REFERENCES photo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE appartement ADD CONSTRAINT fk_71a6bd8dba9cd190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_71a6bd8d7e9e4c8c ON appartement (photo_id)');
        $this->addSql('CREATE INDEX idx_71a6bd8dba9cd190 ON appartement (commentaire_id)');
        $this->addSql('ALTER TABLE photo DROP CONSTRAINT FK_14B78418E1729BBA');
        $this->addSql('ALTER TABLE photo DROP CONSTRAINT FK_14B78418C4FFF555');
        $this->addSql('ALTER TABLE photo DROP CONSTRAINT FK_14B784189D67D8AF');
        $this->addSql('ALTER TABLE photo DROP CONSTRAINT FK_14B78418446F285F');
        $this->addSql('ALTER TABLE photo DROP CONSTRAINT FK_14B784188A2D8B41');
        $this->addSql('DROP INDEX IDX_14B78418E1729BBA');
        $this->addSql('DROP INDEX IDX_14B78418C4FFF555');
        $this->addSql('DROP INDEX IDX_14B784189D67D8AF');
        $this->addSql('DROP INDEX IDX_14B78418446F285F');
        $this->addSql('DROP INDEX IDX_14B784188A2D8B41');
        $this->addSql('ALTER TABLE photo DROP appartement_id');
        $this->addSql('ALTER TABLE photo DROP garage_id');
        $this->addSql('ALTER TABLE photo DROP maison_id');
        $this->addSql('ALTER TABLE photo DROP studio_id');
        $this->addSql('ALTER TABLE photo DROP terrain_id');
        $this->addSql('ALTER TABLE garage ADD photo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE garage ADD commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT fk_9f26610b7e9e4c8c FOREIGN KEY (photo_id) REFERENCES photo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT fk_9f26610bba9cd190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_9f26610b7e9e4c8c ON garage (photo_id)');
        $this->addSql('CREATE INDEX idx_9f26610bba9cd190 ON garage (commentaire_id)');
        $this->addSql('ALTER TABLE studio ADD photo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE studio ADD commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE studio ADD CONSTRAINT fk_4a2b07b67e9e4c8c FOREIGN KEY (photo_id) REFERENCES photo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE studio ADD CONSTRAINT fk_4a2b07b6ba9cd190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_4a2b07b6ba9cd190 ON studio (commentaire_id)');
        $this->addSql('CREATE INDEX idx_4a2b07b67e9e4c8c ON studio (photo_id)');
        $this->addSql('ALTER TABLE terrain ADD photo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE terrain ADD commentaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE terrain ADD CONSTRAINT fk_c87653b17e9e4c8c FOREIGN KEY (photo_id) REFERENCES photo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE terrain ADD CONSTRAINT fk_c87653b1ba9cd190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_c87653b1ba9cd190 ON terrain (commentaire_id)');
        $this->addSql('CREATE INDEX idx_c87653b17e9e4c8c ON terrain (photo_id)');
        $this->addSql('ALTER TABLE commentaire DROP CONSTRAINT FK_67F068BCE1729BBA');
        $this->addSql('ALTER TABLE commentaire DROP CONSTRAINT FK_67F068BCC4FFF555');
        $this->addSql('ALTER TABLE commentaire DROP CONSTRAINT FK_67F068BC9D67D8AF');
        $this->addSql('ALTER TABLE commentaire DROP CONSTRAINT FK_67F068BC446F285F');
        $this->addSql('ALTER TABLE commentaire DROP CONSTRAINT FK_67F068BC8A2D8B41');
        $this->addSql('DROP INDEX IDX_67F068BCE1729BBA');
        $this->addSql('DROP INDEX IDX_67F068BCC4FFF555');
        $this->addSql('DROP INDEX IDX_67F068BC9D67D8AF');
        $this->addSql('DROP INDEX IDX_67F068BC446F285F');
        $this->addSql('DROP INDEX IDX_67F068BC8A2D8B41');
        $this->addSql('ALTER TABLE commentaire DROP appartement_id');
        $this->addSql('ALTER TABLE commentaire DROP garage_id');
        $this->addSql('ALTER TABLE commentaire DROP maison_id');
        $this->addSql('ALTER TABLE commentaire DROP studio_id');
        $this->addSql('ALTER TABLE commentaire DROP terrain_id');
    }
}
