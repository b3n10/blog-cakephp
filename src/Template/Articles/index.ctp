<h1>Blog Articles</h1>

<?= $this->Html->link('Add an Article', ['action' => 'add']) ?>

<?php foreach($articles as $article): ?>
<h3>
    <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
</h3>
<p>
    <?= $article->body ?>
    <br>
    <small>
        <?= $article->created->format(DATE_RFC850) ?>
    </small>
</p>
<?php endforeach ?>
