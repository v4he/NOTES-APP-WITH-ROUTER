<?php
require 'models/db.php';
require 'models/noteModel.php';


function indexNotes()
{
    $notes = getNotes();
    include 'views/header.php';
    include 'views/notes.php';
    include 'views/footer.php';
}

function createNote()
{
    include 'views/header.php';
    include 'views/form.php';
    include 'views/footer.php';
}

function storeNote()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        addNote($_POST['title'], $_POST['content']);
    }
    header("Location: index.php?route=notes.index");
}

function deleteNote()
{
    if (isset($_GET['id'])) {
        deleteNoteById($_GET['id']);
    }
    header("Location: index.php?route=notes.index");
}


function searchNote()
{
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $searchTitle = $_GET['searchTitle'] ?? "";
        $notes = getNotes();
        $results = [];


        foreach ($notes as $note) {
            if ($searchTitle !== "") {
                if (str_contains(mb_strtolower($note['title']) . " " . mb_strtolower($note['content']) , mb_strtolower($searchTitle))) {
                    $results[] = $note;
                }
            }
            else{
                $results = getNotes();
            }
        }

        $notes = $results; // передаём во view отфильтрованные заметки

        var_dump($searchTitle); // теперь точно покажет, что пришло
        var_dump($notes);       // покажет найденные заметки

        include 'views/header.php';
        include 'views/notes.php';
        include 'views/footer.php';
    }
}
