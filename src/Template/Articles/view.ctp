<h1><?= $article->title ?></h1>

<p>
    <?= $article->body ?>
    <br/>
    <small>
        <?= $article->created->format(DATE_RFC850) ?>
    </small>
</p>

<?= $this->Html->link('Edit', ['action' => 'edit', $article->id]) ?> |
<?= $this->Form->postLink('Delete', ['action' => 'delete', $article->id], ['confirm' => 'Are you sure?']) ?>
