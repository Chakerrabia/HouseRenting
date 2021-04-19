<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210419091734 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE personne_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE appartement_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE categorie_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE garage_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE maison_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE photo_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE studio_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE terrain_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE test_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE appartement (id INT NOT NULL, photo_id INT DEFAULT NULL, num VARCHAR(10) DEFAULT NULL, statut BOOLEAN NOT NULL, etat VARCHAR(30) DEFAULT NULL, prix_achat DOUBLE PRECISION DEFAULT NULL, prix_location DOUBLE PRECISION DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, etage INT DEFAULT NULL, ascenseur BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, is_deleted BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_71A6BD8D7E9E4C8C ON appartement (photo_id)');
        $this->addSql('CREATE TABLE categorie (id INT NOT NULL, type VARCHAR(40) NOT NULL, remarques TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE garage (id INT NOT NULL, photo_id INT DEFAULT NULL, num VARCHAR(10) DEFAULT NULL, statut BOOLEAN NOT NULL, etat VARCHAR(30) DEFAULT NULL, prix_achat DOUBLE PRECISION DEFAULT NULL, prix_location DOUBLE PRECISION DEFAULT NULL, surface DOUBLE PRECISION DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, is_deleted BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9F26610B7E9E4C8C ON garage (photo_id)');
        $this->addSql('CREATE TABLE maison (id INT NOT NULL, num VARCHAR(10) DEFAULT NULL, statut BOOLEAN NOT NULL, etat VARCHAR(30) DEFAULT NULL, prix_achat DOUBLE PRECISION DEFAULT NULL, prix_location DOUBLE PRECISION DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, nb_chambre INT DEFAULT NULL, jardin VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, is_deleted BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE photo (id INT NOT NULL, image VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, is_deleted BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE studio (id INT NOT NULL, photo_id INT DEFAULT NULL, num VARCHAR(10) DEFAULT NULL, statut BOOLEAN NOT NULL, etat VARCHAR(30) DEFAULT NULL, prix_achat DOUBLE PRECISION DEFAULT NULL, prix_location DOUBLE PRECISION DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, etage INT DEFAULT NULL, ascenseur BOOLEAN DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, is_deleted BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4A2B07B67E9E4C8C ON studio (photo_id)');
        $this->addSql('CREATE TABLE terrain (id INT NOT NULL, photo_id INT DEFAULT NULL, num VARCHAR(10) DEFAULT NULL, statut BOOLEAN NOT NULL, etat VARCHAR(30) DEFAULT NULL, prix_achat DOUBLE PRECISION DEFAULT NULL, prix_location DOUBLE PRECISION DEFAULT NULL, surface DOUBLE PRECISION DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, deleted_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, is_deleted BOOLEAN DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C87653B17E9E4C8C ON terrain (photo_id)');
        $this->addSql('CREATE TABLE test (id INT NOT NULL, test VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON "user" (username)');
        $this->addSql('ALTER TABLE appartement ADD CONSTRAINT FK_71A6BD8D7E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE garage ADD CONSTRAINT FK_9F26610B7E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE studio ADD CONSTRAINT FK_4A2B07B67E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE terrain ADD CONSTRAINT FK_C87653B17E9E4C8C FOREIGN KEY (photo_id) REFERENCES photo (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE appartement DROP CONSTRAINT FK_71A6BD8D7E9E4C8C');
        $this->addSql('ALTER TABLE garage DROP CONSTRAINT FK_9F26610B7E9E4C8C');
        $this->addSql('ALTER TABLE studio DROP CONSTRAINT FK_4A2B07B67E9E4C8C');
        $this->addSql('ALTER TABLE terrain DROP CONSTRAINT FK_C87653B17E9E4C8C');
        $this->addSql('DROP SEQUENCE appartement_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE categorie_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE garage_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE maison_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE photo_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE studio_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE terrain_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE test_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE personne_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('DROP TABLE appartement');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE garage');
        $this->addSql('DROP TABLE maison');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE studio');
        $this->addSql('DROP TABLE terrain');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE "user"');
    }
}
