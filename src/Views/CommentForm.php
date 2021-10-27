<a name="comments">
    <h3 class="uk-heading-small"><?php echo __('Comments', 'wptheme-valerieknill'); ?></h3>
</a>


<div id="parent-comment" class="uk-hidden">
<a href="#" class="uk-button uk-button-secondary button-cancel-reply">Cancel Reply</a>

<h5 class="uk-heading-xsmall">Replying to comment:</h5>

        <article class="uk-comment">
            <header class="uk-comment-header">
                <div class="uk-grid-medium uk-flex-middle uk-grid" uk-grid="">
                    <div class="uk-width-auto uk-first-column comment-avatar">
                    </div>
                    <div class="uk-width-expand">
                        <h4 class="uk-comment-title uk-margin-remove comment-title"></h4>
                        <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
                            <li class="comment-date"></li>
                        </ul>
                    </div>
                </div>
            </header>
            <div class="uk-comment-body comment-body">
            </div>
        </article>
</div>
<?php comment_form($this->data['arguments'], $this->data['post']); ?>
