<?php

function insertHistory($sender, $recipient, $subject, $message) {
    try {
        $pdo = createPDO();
        
        createHistoryTable($pdo);

        // Preparar i executar la inserció
        $stmt = $pdo->prepare("INSERT INTO history (sender, recipient, subject, body) VALUES (?, ?, ?, ?)");
        $stmt->execute([$sender, $recipient, $subject, $message]);
        
        return true;
        
    } catch (PDOException $e) {
        return false;
    }
}

function getHistory() {
    try {
        $pdo = createPDO();

        createHistoryTable($pdo);
        
        // Preparar i executar la consulta
        $stmt = $pdo->query("SELECT sender, recipient, subject, body FROM history");
        $history = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $history;
        
    } catch (PDOException $e) {
        return false;
    }
}

function createPDO(): PDO {
    $dbPath = __DIR__ . '/../historydb.db';
    $pdo = new PDO("sqlite:" . $dbPath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}

function createHistoryTable($pdo) {
    try {
        $createTableSQL = "CREATE TABLE IF NOT EXISTS history (
            history_id INTEGER PRIMARY KEY AUTOINCREMENT,
            sender TEXT NOT NULL,
            recipient TEXT NOT NULL,
            subject TEXT NOT NULL,
            body TEXT NOT NULL
        )";
        $pdo->exec($createTableSQL);
    } catch (PDOException $e) {
        throw new Exception("No se ha podido crear la base de datos.");
    }
}

?>