<?php
function getNotes() {
    global $pdo;
    return $pdo->query("SELECT * FROM notes ORDER BY created_at DESC")->fetchAll();
}

function addNote($title, $content) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO notes (title, content) VALUES (?, ?)");
    $stmt->execute([htmlspecialchars($title), htmlspecialchars($content)]);
}

function deleteNoteById($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM notes WHERE id = ?");
    $stmt->execute([$id]);
}

