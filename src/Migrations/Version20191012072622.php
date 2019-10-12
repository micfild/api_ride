<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191012072622 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_bike_type (user_id INT NOT NULL, bike_type_id INT NOT NULL, INDEX IDX_9D89DD21A76ED395 (user_id), INDEX IDX_9D89DD217FF015AE (bike_type_id), PRIMARY KEY(user_id, bike_type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_bike_type ADD CONSTRAINT FK_9D89DD21A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_bike_type ADD CONSTRAINT FK_9D89DD217FF015AE FOREIGN KEY (bike_type_id) REFERENCES bike_type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD driving_style INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user_bike_type');
        $this->addSql('ALTER TABLE user DROP driving_style');
    }
}
