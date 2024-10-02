<?php

require __DIR__ . '/../vendor/autoload.php';

echo "Executando migrações...\n";
require_once 'database/migrate.php';
echo "Projeto iniciado com sucesso.\n";
