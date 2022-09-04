<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220510090404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(
            'CREATE TABLE academy (
            id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', 
            title VARCHAR(255) DEFAULT NULL, 
            academy_url VARCHAR(255) DEFAULT NULL, 
            academy_image_url VARCHAR(255) DEFAULT NULL, 
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
        $this->addSql(
            'CREATE TABLE program (
            id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', 
            academy_id CHAR(36) NOT NULL COMMENT \'(DC2Type:guid)\', 
            title VARCHAR(255) DEFAULT NULL, 
            city VARCHAR(255) DEFAULT NULL, 
            price VARCHAR(255) DEFAULT NULL, 
            school_image_url VARCHAR(255) DEFAULT NULL, 
            starts_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', 
            INDEX IDX_92ED77846D55ACAB (academy_id), PRIMARY KEY(id)
            ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB'
        );
        $this->addSql('ALTER TABLE program ADD CONSTRAINT FK_92ED77846D55ACAB FOREIGN KEY (academy_id) REFERENCES academy (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE program DROP FOREIGN KEY FK_92ED77846D55ACAB');
        $this->addSql('DROP TABLE academy');
        $this->addSql('DROP TABLE program');
    }
}
