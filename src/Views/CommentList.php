<ul class="uk-comment-list">
<?php foreach ($this->getComments() as $comment): ?>

<?php printComment($this, $comment); ?>

<?php endforeach; ?>

</ul>

<?php function printComment($context, $comment) {

?>

    <li>
        <article class="uk-comment">
            <header class="uk-comment-header">
                <div class="uk-grid-medium uk-flex-middle uk-grid" uk-grid="">
                    <div class="uk-width-auto uk-first-column">
                        <img class="uk-comment-avatar" src="<?php echo get_avatar_url($comment->comment_author_email); ?>" alt="" width="80" height="80">
                    </div>
                    <div class="uk-width-expand">
                        <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="<?php echo $comment->comment_author_url; ?>"><?php echo $comment->comment_parent . ' > ' . $comment->comment_ID . ': ' . $comment->comment_author; ?></a></h4>
                        <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                            <li><?php echo $comment->comment_date; ?></li>
                            <li><a href="#">Reply</a></li>
                        </ul>
                    </div>
                </div>
            </header>
            <div class="uk-comment-body">
                <p><?php echo $comment->comment_content; ?></p>
            </div>
        </article>
<?php if (!empty($childComments = $context->getComments($comment->comment_ID))): ?>

            <ul>
<?php foreach ($childComments as $childComment): ?>

<?php printComment($context, $childComment); ?>

<?php endforeach; ?>
            </ul>

<?php endif; ?>
    </li>


<?php } ?>



