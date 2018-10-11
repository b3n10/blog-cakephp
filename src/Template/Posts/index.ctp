<h1>Posts:</h1>

<ul>
    <?php foreach($posts as $post): ?>
    <li>
        <h3>
            <?= $post->title ?>
        </h3>
        <p>
            <?= $post->body ?>
        </p>
    </li>
    <?php endforeach ?>
</ul>
