<?php $title = 'Chapters view'; ?>
<?php ob_start(); ?>

<?php
    while( $chapters = $showChapters->fetch()) 
    {
?>
    <div class="form">
        <h3>
            <?= htmlspecialchars( $chapters['title'] ); ?>
            <em>, written <?= $chapters['creation_date']; ?></em>
        </h3>
        <p>
            <?= nl2br( htmlspecialchars( $chapters['content'] )); ?><br />
            <em><a href="index.php?action=showComments&id=<?= $chapters['id'];?>">Comment</a></em>
        </p>
    </div>
<?php
    } 
?>

<?php $content = ob_get_clean(); ?>
<?php require('view/template.php'); ?>