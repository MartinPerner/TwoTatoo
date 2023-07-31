<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230711073825 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture ADD image_name VARCHAR(255) DEFAULT NULL, ADD image_size INT DEFAULT NULL, DROP url_picture');
        $this->addSql('ALTER TABLE user CHANGE reset_token reset_token VARCHAR(100) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture ADD url_picture VARCHAR(255) NOT NULL, DROP image_name, DROP image_size');
        $this->addSql('ALTER TABLE user CHANGE reset_token reset_token VARCHAR(100) DEFAULT NULL');
    }
}
