<?php

declare(strict_types=1);

namespace Fabio\Doctrine\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221122222140 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Criação de um tabela de testes';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('teste');
        $table->addColumn('id', 'integer')->setAutoincrement(true);
        $table->addColumn('coluna_teste', 'string');

        $table->setPrimaryKey(['id']);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('teste');

    }
}
