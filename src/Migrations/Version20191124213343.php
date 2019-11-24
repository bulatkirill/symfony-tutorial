<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191124213343 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE person');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, name, description, price FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, description CLOB DEFAULT NULL, price NUMERIC(7, 2) DEFAULT NULL, note VARCHAR(255) DEFAULT NULL)');
        $this->addSql('INSERT INTO product (id, name, description, price) SELECT id, name, description, price FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE person (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, surname VARCHAR(255) NOT NULL COLLATE BINARY, profession VARCHAR(255) DEFAULT NULL COLLATE BINARY)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__product AS SELECT id, name, description, price FROM product');
        $this->addSql('DROP TABLE product');
        $this->addSql('CREATE TABLE product (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL COLLATE BINARY, price INTEGER DEFAULT NULL)');
        $this->addSql('INSERT INTO product (id, name, description, price) SELECT id, name, description, price FROM __temp__product');
        $this->addSql('DROP TABLE __temp__product');
    }
}
