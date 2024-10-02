<?php

$pdo = (new \Src\Connect())->connection();

$checkTable = $pdo->query("SHOW TABLES LIKE 'migrations'")->rowCount();
if ($checkTable == 0) {
    $pdo->exec("CREATE TABLE migrations (id INT AUTO_INCREMENT PRIMARY KEY, migration VARCHAR(255), batch INT, created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP)");
}

$migrationsPath = __DIR__ . '/migrations/';
$migrations = scandir($migrationsPath);

$executedMigrations = $pdo->query("SELECT migration FROM migrations")->fetchAll(PDO::FETCH_COLUMN);

$batch = $pdo->query("SELECT MAX(batch) FROM migrations")->fetchColumn();
$batch = $batch ? $batch + 1 : 1;

foreach ($migrations as $migration) {
    if (!in_array($migration, $executedMigrations) && pathinfo($migration, PATHINFO_EXTENSION) === 'sql') {
        $sql = file_get_contents($migrationsPath . $migration);
        $pdo->exec($sql);

        // Registrar migração na tabela de controle
        $stmt = $pdo->prepare("INSERT INTO migrations (migration, batch) VALUES (?, ?)");
        $stmt->execute([$migration, $batch]);

        echo "Migração $migration executada com sucesso.\n";
    }
}

echo "Todas as migrações estão atualizadas.\n";