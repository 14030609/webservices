<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180508125235 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SEQUENCE employees_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE salaries_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE employees (id INT NOT NULL, emp_no INT NOT NULL, birth_date DATE NOT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, gender VARCHAR(10) NOT NULL, hire_date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN employees.birth_date IS \'(DC2Type:date_immutable)\'');
        $this->addSql('COMMENT ON COLUMN employees.hire_date IS \'(DC2Type:date_immutable)\'');
        $this->addSql('CREATE TABLE salaries (id INT NOT NULL, emp_no_id INT NOT NULL, salary NUMERIC(2, 0) NOT NULL, from_date DATE NOT NULL, to_date DATE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E6EEB84B76E43D7D ON salaries (emp_no_id)');
        $this->addSql('COMMENT ON COLUMN salaries.from_date IS \'(DC2Type:date_immutable)\'');
        $this->addSql('COMMENT ON COLUMN salaries.to_date IS \'(DC2Type:date_immutable)\'');
        $this->addSql('ALTER TABLE salaries ADD CONSTRAINT FK_E6EEB84B76E43D7D FOREIGN KEY (emp_no_id) REFERENCES employees (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE salaries DROP CONSTRAINT FK_E6EEB84B76E43D7D');
        $this->addSql('DROP SEQUENCE employees_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE salaries_id_seq CASCADE');
        $this->addSql('DROP TABLE employees');
        $this->addSql('DROP TABLE salaries');
    }
}
