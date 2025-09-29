<?php

function insertHistory($sender, $recipient, $subject, $message) {
    try {
        // Ubicacio de la base de dades
        $dbPath = __DIR__ . '/../historydb.db';
        $pdo = new PDO("sqlite:" . $dbPath);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // Crear la base de dades amb la taula si no existeix
        $createTableSQL = "CREATE TABLE IF NOT EXISTS history (
            history_id INTEGER PRIMARY KEY AUTOINCREMENT,
            sender TEXT NOT NULL,
            recipient TEXT NOT NULL,
            subject TEXT NOT NULL,
            body TEXT NOT NULL
        )";
        $pdo->exec($createTableSQL);
        
        // Preparar i executar la inserció
        $stmt = $pdo->prepare("INSERT INTO history (sender, recipient, subject, body) VALUES (?, ?, ?, ?)");
        $stmt->execute([$sender, $recipient, $subject, $message]);
        
        return true;
        
    } catch (PDOException $e) {
        return false;
    }
}

?>