<article class="uk-article uk-inline">
<?php if (!empty($this->data['post_title'])): ?>
    <a href="<?php echo $this->data['post_permalink']; ?>"><h1 class="uk-article-title"><?php echo $this->data['post_title']; ?></h1></a>
<?php endif; ?>
    <p class="uk-article-meta"><?php echo sprintf(_x('Written on %s by', 'PostView componet date', 'wptheme-valerieknill'), $this->data['post_date']); ?> <a href="<?php echo $this->data['author_page_link']; ?>"><?php echo $this->data['post_author']->nickname; ?></a>.</p>
<?php if ($this->data['format'] === 'excerpt'): ?>
    <p class="uk-text-lead uk-padding-small"><?php echo $this->data['post_excerpt']; ?></p>
<?php else: ?>
    <p class="uk-text-lead uk-padding-small"><?php echo $this->data['post_content']; ?></p>
<?php endif; ?>
<?php if ($this->data['links']): ?>
    <div class="uk-position-bottom-right uk-grid-small uk-child-width-auto uk-grid" uk-grid="">
        <div class="uk-first-column">
            <a class="uk-button uk-button-text" href="<?php echo $this->data['post_permalink']; ?>"><?php echo __('continue reading...', 'wptheme-valerieknill'); ?></a>
        </div>
        <div>
<?php if (empty($this->data['comment_count']) || $this->data['comment_count'] === 0): ?>
<?php echo __('no comments yet', 'wptheme-valerieknill'); ?>
<?php else: ?>
            <a class="uk-button uk-button-text" href="<?php echo $this->data['post_permalink']; ?>#comments">
<?php echo sprintf(__('%d comments', 'wptheme-valerieknill'), $this->data['comment_count']); ?>
</a>
<?php endif; ?>
        </div>
<?php endif; ?>
    </div>
</article>
