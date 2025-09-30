<h2>Mes notes</h2>
<a href="index.php?route=notes.create">+ Ajouter une note</a>
<ul>

  <?php foreach ($notes as $note): ?>
    <li>
      <b><?= $note['title'] ?></b> - <?= $note['content'] ?>
      <a href="index.php?route=notes.delete&id=<?= $note['id'] ?>">❌</a>
    </li>
  <?php endforeach; ?>
</ul>