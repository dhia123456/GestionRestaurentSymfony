<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231120152035 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(190) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meal (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, title VARCHAR(190) NOT NULL, description LONGTEXT DEFAULT NULL, price VARCHAR(190) DEFAULT NULL, picture VARCHAR(190) DEFAULT NULL, INDEX IDX_9EF68E9C12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(190) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_option (menu_id INT NOT NULL, option_id INT NOT NULL, INDEX IDX_89C15868CCD7E912 (menu_id), INDEX IDX_89C15868A7C41D6F (option_id), PRIMARY KEY(menu_id, option_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `option` (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(190) NOT NULL, price VARCHAR(190) DEFAULT NULL, description LONGTEXT DEFAULT NULL, day VARCHAR(190) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, client_number INT DEFAULT NULL, time VARCHAR(190) DEFAULT NULL, is_allergy TINYINT(1) DEFAULT NULL, lastname VARCHAR(190) DEFAULT NULL, firstname VARCHAR(190) DEFAULT NULL, phone VARCHAR(190) DEFAULT NULL, email VARCHAR(190) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE schedule (id INT AUTO_INCREMENT NOT NULL, monday VARCHAR(190) DEFAULT NULL, tuesday VARCHAR(190) DEFAULT NULL, wednesday VARCHAR(190) DEFAULT NULL, thursday VARCHAR(190) DEFAULT NULL, friday VARCHAR(190) DEFAULT NULL, saturday VARCHAR(190) DEFAULT NULL, sunday VARCHAR(190) DEFAULT NULL, evmonday VARCHAR(190) DEFAULT NULL, evtuesday VARCHAR(190) DEFAULT NULL, evwednesday VARCHAR(190) DEFAULT NULL, evthursday VARCHAR(190) DEFAULT NULL, evfriday VARCHAR(190) DEFAULT NULL, evsaturday VARCHAR(190) DEFAULT NULL, evsunday VARCHAR(190) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scheduleevening (id INT AUTO_INCREMENT NOT NULL, monday VARCHAR(190) DEFAULT NULL, tuesday VARCHAR(190) DEFAULT NULL, wednesday VARCHAR(190) DEFAULT NULL, thursday VARCHAR(190) DEFAULT NULL, friday VARCHAR(190) DEFAULT NULL, saturday VARCHAR(190) DEFAULT NULL, sunday VARCHAR(190) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE meal ADD CONSTRAINT FK_9EF68E9C12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE menu_option ADD CONSTRAINT FK_89C15868CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_option ADD CONSTRAINT FK_89C15868A7C41D6F FOREIGN KEY (option_id) REFERENCES `option` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE meal DROP FOREIGN KEY FK_9EF68E9C12469DE2');
        $this->addSql('ALTER TABLE menu_option DROP FOREIGN KEY FK_89C15868CCD7E912');
        $this->addSql('ALTER TABLE menu_option DROP FOREIGN KEY FK_89C15868A7C41D6F');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE meal');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE menu_option');
        $this->addSql('DROP TABLE `option`');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE schedule');
        $this->addSql('DROP TABLE scheduleevening');
    }
}
