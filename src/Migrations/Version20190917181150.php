<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190917181150 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user ADD first_name VARCHAR(255) NOT NULL, ADD last_name VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL, ADD created_at DATETIME NOT NULL, DROP nom, DROP prenom, DROP passwd');
        $this->addSql('ALTER TABLE job ADD job_title VARCHAR(255) NOT NULL, ADD location VARCHAR(255) NOT NULL, DROP skills, DROP tasks, CHANGE secteur secteur VARCHAR(255) NOT NULL, CHANGE company_name company_name VARCHAR(255) NOT NULL, CHANGE nb_post nb_post INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE job ADD skills LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD tasks LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, DROP job_title, DROP location, CHANGE secteur secteur LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE company_name company_name LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE nb_post nb_post LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user ADD nom LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD prenom LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, ADD passwd LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci, DROP first_name, DROP last_name, DROP email, DROP password, DROP created_at');
    }
}
