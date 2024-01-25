<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240123174557 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE policy_driver DROP FOREIGN KEY FK_3BB291C42D29E3C6');
        $this->addSql('ALTER TABLE policy_driver DROP FOREIGN KEY FK_3BB291C4C3423909');
        $this->addSql('DROP TABLE policy_driver');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE policy_driver (policy_id INT NOT NULL, driver_id INT NOT NULL, INDEX IDX_3BB291C4C3423909 (driver_id), INDEX IDX_3BB291C42D29E3C6 (policy_id), PRIMARY KEY(policy_id, driver_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE policy_driver ADD CONSTRAINT FK_3BB291C42D29E3C6 FOREIGN KEY (policy_id) REFERENCES policy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE policy_driver ADD CONSTRAINT FK_3BB291C4C3423909 FOREIGN KEY (driver_id) REFERENCES driver (id) ON DELETE CASCADE');
    }
}
