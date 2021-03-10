<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210310151759 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherent ADD mail VARCHAR(255) NOT NULL, ADD password VARCHAR(255) NOT NULL, DROP email, DROP test, CHANGE cp cp VARCHAR(255) NOT NULL, CHANGE ville ville VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE auteur CHANGE relation_id relation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE editeur CHANGE nom nom VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE livre CHANGE annee annee VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE pret DROP FOREIGN KEY FK_52ECE97937D925CB');
        $this->addSql('DROP INDEX IDX_52ECE97937D925CB ON pret');
        $this->addSql('ALTER TABLE pret ADD relation_id INT DEFAULT NULL, ADD date_retour_prevue DATE NOT NULL, ADD date_retour_reelle DATE NOT NULL, DROP livre_id, DROP dateretourpret, DROP dateretourreelle, CHANGE adherent_id adherent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE pret ADD CONSTRAINT FK_52ECE9793256915B FOREIGN KEY (relation_id) REFERENCES livre (id)');
        $this->addSql('CREATE INDEX IDX_52ECE9793256915B ON pret (relation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adherent ADD email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, ADD test VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP mail, DROP password, CHANGE cp cp INT DEFAULT 0 NOT NULL, CHANGE ville ville VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT \'\' NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE auteur CHANGE relation_id relation_id INT NOT NULL');
        $this->addSql('ALTER TABLE editeur CHANGE nom nom VARCHAR(50) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE livre CHANGE annee annee INT NOT NULL');
        $this->addSql('ALTER TABLE pret DROP FOREIGN KEY FK_52ECE9793256915B');
        $this->addSql('DROP INDEX IDX_52ECE9793256915B ON pret');
        $this->addSql('ALTER TABLE pret ADD livre_id INT NOT NULL, ADD dateretourpret DATE NOT NULL, ADD dateretourreelle DATE NOT NULL, DROP relation_id, DROP date_retour_prevue, DROP date_retour_reelle, CHANGE adherent_id adherent_id INT NOT NULL');
        $this->addSql('ALTER TABLE pret ADD CONSTRAINT FK_52ECE97937D925CB FOREIGN KEY (livre_id) REFERENCES livre (id)');
        $this->addSql('CREATE INDEX IDX_52ECE97937D925CB ON pret (livre_id)');
    }
}
