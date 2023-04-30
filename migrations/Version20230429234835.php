<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230429234835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE representations (id INT AUTO_INCREMENT NOT NULL, the_show_id INT NOT NULL, the_location_id INT DEFAULT NULL, schedule DATETIME NOT NULL, INDEX IDX_C90A4013013D282 (the_show_id), INDEX IDX_C90A401D48E1165 (the_location_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE representations ADD CONSTRAINT FK_C90A4013013D2823013D282 FOREIGN KEY (the_show_id) REFERENCES shows (id) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE representations ADD CONSTRAINT FK_C90A401D48E1165 FOREIGN KEY (the_location_id) REFERENCES locations (id) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE locations CHANGE address address VARCHAR(255) DEFAULT NULL, CHANGE website website VARCHAR(255) DEFAULT NULL, CHANGE phone phone VARCHAR(30) DEFAULT NULL');
        $this->addSql('ALTER TABLE shows CHANGE poster_url poster_url VARCHAR(255) DEFAULT NULL, CHANGE price price NUMERIC(12, 2) DEFAULT NULL');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE representations DROP FOREIGN KEY FK_C90A4013013D2823013D282');
        $this->addSql('ALTER TABLE representations DROP FOREIGN KEY FK_C90A401D48E1165');
        $this->addSql('DROP TABLE representations');
        $this->addSql('ALTER TABLE locations CHANGE address address VARCHAR(255) DEFAULT \'NULL\', CHANGE website website VARCHAR(255) DEFAULT \'NULL\', CHANGE phone phone VARCHAR(30) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE messenger_messages CHANGE delivered_at delivered_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE shows CHANGE poster_url poster_url VARCHAR(255) DEFAULT \'NULL\', CHANGE price price NUMERIC(12, 2) DEFAULT \'NULL\'');
    }
}
