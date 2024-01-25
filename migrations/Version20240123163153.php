<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240123163153 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, street VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, zip INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE coverage (id INT AUTO_INCREMENT NOT NULL, vehicle_id INT DEFAULT NULL, type VARCHAR(255) NOT NULL, coverage_limit INT DEFAULT NULL, deductible INT DEFAULT NULL, INDEX IDX_5556F36B545317D1 (vehicle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE driver (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, age INT NOT NULL, gender VARCHAR(255) NOT NULL, marital_status VARCHAR(255) NOT NULL, license_number INT NOT NULL, license_state VARCHAR(255) NOT NULL, license_status VARCHAR(255) NOT NULL, license_effective_date DATE NOT NULL, license_expiration_date DATE NOT NULL, license_class VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE holder (id INT AUTO_INCREMENT NOT NULL, address_id INT DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D6A868BDF5B7AF75 (address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE policy (id INT AUTO_INCREMENT NOT NULL, policy_holder_id INT DEFAULT NULL, policy_no INT NOT NULL, policy_status VARCHAR(255) NOT NULL, policy_type VARCHAR(255) NOT NULL, policy_effective_date DATE NOT NULL, policy_expiration_date DATE NOT NULL, UNIQUE INDEX UNIQ_F07D0516A07EC9B5 (policy_holder_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE policy_driver (policy_id INT NOT NULL, driver_id INT NOT NULL, INDEX IDX_3BB291C42D29E3C6 (policy_id), INDEX IDX_3BB291C4C3423909 (driver_id), PRIMARY KEY(policy_id, driver_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicle (id INT AUTO_INCREMENT NOT NULL, garaging_address_id INT DEFAULT NULL, policy_id INT DEFAULT NULL, year INT NOT NULL, make VARCHAR(255) NOT NULL, model VARCHAR(255) NOT NULL, vin INT NOT NULL, vehicle_usage VARCHAR(255) NOT NULL, primary_use VARCHAR(255) NOT NULL, annual_mileage INT NOT NULL, ownership VARCHAR(255) NOT NULL, INDEX IDX_1B80E4867A926313 (garaging_address_id), INDEX IDX_1B80E4862D29E3C6 (policy_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE coverage ADD CONSTRAINT FK_5556F36B545317D1 FOREIGN KEY (vehicle_id) REFERENCES vehicle (id)');
        $this->addSql('ALTER TABLE holder ADD CONSTRAINT FK_D6A868BDF5B7AF75 FOREIGN KEY (address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE policy ADD CONSTRAINT FK_F07D0516A07EC9B5 FOREIGN KEY (policy_holder_id) REFERENCES holder (id)');
        $this->addSql('ALTER TABLE policy_driver ADD CONSTRAINT FK_3BB291C42D29E3C6 FOREIGN KEY (policy_id) REFERENCES policy (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE policy_driver ADD CONSTRAINT FK_3BB291C4C3423909 FOREIGN KEY (driver_id) REFERENCES driver (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E4867A926313 FOREIGN KEY (garaging_address_id) REFERENCES address (id)');
        $this->addSql('ALTER TABLE vehicle ADD CONSTRAINT FK_1B80E4862D29E3C6 FOREIGN KEY (policy_id) REFERENCES policy (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE coverage DROP FOREIGN KEY FK_5556F36B545317D1');
        $this->addSql('ALTER TABLE holder DROP FOREIGN KEY FK_D6A868BDF5B7AF75');
        $this->addSql('ALTER TABLE policy DROP FOREIGN KEY FK_F07D0516A07EC9B5');
        $this->addSql('ALTER TABLE policy_driver DROP FOREIGN KEY FK_3BB291C42D29E3C6');
        $this->addSql('ALTER TABLE policy_driver DROP FOREIGN KEY FK_3BB291C4C3423909');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E4867A926313');
        $this->addSql('ALTER TABLE vehicle DROP FOREIGN KEY FK_1B80E4862D29E3C6');
        $this->addSql('DROP TABLE address');
        $this->addSql('DROP TABLE coverage');
        $this->addSql('DROP TABLE driver');
        $this->addSql('DROP TABLE holder');
        $this->addSql('DROP TABLE policy');
        $this->addSql('DROP TABLE policy_driver');
        $this->addSql('DROP TABLE vehicle');
    }
}
