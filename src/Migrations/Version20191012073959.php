<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191012073959 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE planed_ride (id INT AUTO_INCREMENT NOT NULL, organizer_id INT NOT NULL, region VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, gpx VARCHAR(255) DEFAULT NULL, INDEX IDX_9AD6F557876C4DDA (organizer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE planed_ride ADD CONSTRAINT FK_9AD6F557876C4DDA FOREIGN KEY (organizer_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD description LONGTEXT NOT NULL, ADD start_time DATETIME NOT NULL, ADD duration INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE planed_ride');
        $this->addSql('ALTER TABLE user DROP description, DROP start_time, DROP duration');
    }
}
