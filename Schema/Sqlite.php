<?php

namespace Kanboard\Plugin\LegendaTasks\Schema;

const VERSION = 1;

function version_1($pdo)
{
    $pdo->exec('
        CREATE TABLE IF NOT EXISTS legendas (
            "id" INTEGER PRIMARY KEY,
            "nome" VARCHAR(255) NOT NULL,
            "color_id" VARCHAR(255) NOT NULL,
            "project_id" INTEGER NOT NULL,
            FOREIGN KEY(project_id) REFERENCES projects(id) ON DELETE CASCADE
        )
    ');
}

?>
