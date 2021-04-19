<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210419074546 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE missions MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE missions DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE missions CHANGE id id INT NOT NULL, CHANGE alias alias VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE missions ADD PRIMARY KEY (alias)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE missions MODIFY alias VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE missions DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE missions CHANGE alias alias VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE missions ADD PRIMARY KEY (id)');
    }
}
