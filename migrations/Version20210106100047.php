<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210106100047 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherent CHANGE cp cp VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE livre ADD nationalite_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F991B063272 FOREIGN KEY (nationalite_id) REFERENCES nationalite (id)');
        $this->addSql('CREATE INDEX IDX_AC634F991B063272 ON livre (nationalite_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherent CHANGE cp cp INT NOT NULL');
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F991B063272');
        $this->addSql('DROP INDEX IDX_AC634F991B063272 ON livre');
        $this->addSql('ALTER TABLE livre DROP nationalite_id');
    }
}
