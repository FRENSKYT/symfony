<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240704121409 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9A73F0036');
        $this->addSql('ALTER TABLE villes_france_free DROP FOREIGN KEY départements');
        $this->addSql('DROP TABLE regions');
        $this->addSql('DROP TABLE départements');
        $this->addSql('DROP TABLE villes');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE villes_france_free');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE regions (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, insee_id VARCHAR(5) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE départements (id INT AUTO_INCREMENT NOT NULL, NOM VARCHAR(23) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, NUMERO VARCHAR(60) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, region_id VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, REGION VARCHAR(26) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, CHEF LIEU VARCHAR(20) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, SUPERFICIE (km²) VARCHAR(6) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, POPULATION VARCHAR(9) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, DENSITE (habitants/km2) VARCHAR(7) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE villes (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, code_postal VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, ville_id INT DEFAULT NULL, nom VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, ident VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, INDEX IDX_1483A5E9A73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, email VARCHAR(100) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, UNIQUE INDEX username (username), UNIQUE INDEX email (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE villes_france_free (id INT UNSIGNED AUTO_INCREMENT NOT NULL, departement_id INT DEFAULT NULL, departement_nom VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, region_nom VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_departement VARCHAR(3) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_slug VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_nom VARCHAR(45) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_nom_simple VARCHAR(45) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_nom_reel VARCHAR(45) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_nom_soundex VARCHAR(20) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_nom_metaphone VARCHAR(22) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_code_postal VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_commune VARCHAR(3) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_code_commune VARCHAR(5) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_arrondissement SMALLINT UNSIGNED DEFAULT NULL, ville_canton VARCHAR(4) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_amdi SMALLINT UNSIGNED DEFAULT NULL, ville_population_2010 INT UNSIGNED DEFAULT NULL, ville_population_1999 INT UNSIGNED DEFAULT NULL, ville_population_2012 INT UNSIGNED DEFAULT NULL COMMENT \'approximatif\', ville_densite_2010 INT DEFAULT NULL, ville_surface DOUBLE PRECISION DEFAULT NULL, ville_longitude_deg DOUBLE PRECISION DEFAULT NULL, ville_latitude_deg DOUBLE PRECISION DEFAULT NULL, ville_longitude_grd VARCHAR(9) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_latitude_grd VARCHAR(8) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_longitude_dms VARCHAR(9) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_latitude_dms VARCHAR(8) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_general_ci`, ville_zmin INT DEFAULT NULL, ville_zmax INT DEFAULT NULL, INDEX départements (departement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9A73F0036 FOREIGN KEY (ville_id) REFERENCES villes (id)');
        $this->addSql('ALTER TABLE villes_france_free ADD CONSTRAINT départements FOREIGN KEY (departement_id) REFERENCES départements (id)');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
