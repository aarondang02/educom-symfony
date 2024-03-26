<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240326083220 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE artiest (id INT AUTO_INCREMENT NOT NULL, naam VARCHAR(50) NOT NULL, genre VARCHAR(50) NOT NULL, omschrijving VARCHAR(255) NOT NULL, afbeeling_url VARCHAR(255) NOT NULL, website VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE optreden ADD artiest_id INT NOT NULL, ADD voorprogramma_id INT DEFAULT NULL, ADD omschrijving VARCHAR(255) NOT NULL, ADD datum DATE NOT NULL, ADD prijs DOUBLE PRECISION NOT NULL, ADD ticket_url VARCHAR(255) NOT NULL, ADD afbeelding_url VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE optreden ADD CONSTRAINT FK_6286F65DAED85528 FOREIGN KEY (artiest_id) REFERENCES artiest (id)');
        $this->addSql('ALTER TABLE optreden ADD CONSTRAINT FK_6286F65DE017CE10 FOREIGN KEY (voorprogramma_id) REFERENCES artiest (id)');
        $this->addSql('CREATE INDEX IDX_6286F65DAED85528 ON optreden (artiest_id)');
        $this->addSql('CREATE INDEX IDX_6286F65DE017CE10 ON optreden (voorprogramma_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE optreden DROP FOREIGN KEY FK_6286F65DAED85528');
        $this->addSql('ALTER TABLE optreden DROP FOREIGN KEY FK_6286F65DE017CE10');
        $this->addSql('DROP TABLE artiest');
        $this->addSql('DROP INDEX IDX_6286F65DAED85528 ON optreden');
        $this->addSql('DROP INDEX IDX_6286F65DE017CE10 ON optreden');
        $this->addSql('ALTER TABLE optreden DROP artiest_id, DROP voorprogramma_id, DROP omschrijving, DROP datum, DROP prijs, DROP ticket_url, DROP afbeelding_url');
    }
}
