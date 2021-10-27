<?php foreach ($this->data['children'] as $key => $child): ?>
<?php if ($child->isValid()): ?>
            <div class="<?php echo (empty($this->data['div-classes'][$key])?'':$this->data['div-classes'][$key]); ?>">

<?php $child->render(); ?>

            </div>
<?php endif; ?>


<?php endforeach; ?>


<?php if (!empty($this->data['pagination']) && $this->data['pagination']['enabled']): ?>

    <ul class="uk-pagination uk-flex-center" uk-margin="">
        <li class="uk-first-column"><a href="#"><span uk-pagination-previous="" class="uk-icon uk-pagination-previous"></span></a></li>
<?php $baseLink = get_permalink(get_queried_object_id()); ?>
<?php for ($i = 1; $i <= $this->dataSource->getTotalPages(); $i++): ?>
        <li>
<?php if ($this->dataSource->getCurrentPage() === $i): ?>
            <li class="uk-active"><span><?php echo $i; ?></span></li>
<?php else: ?>
<?php $link = add_query_arg('paged', $i, $baseLink); ?>
            <a href="<?php echo $link; ?>"><?php echo $i; ?></a>
<?php endif; ?>
        </li>
<?php endfor; ?>
        <li><a href="#"><span uk-pagination-next="" class="uk-icon uk-pagination-next"></span></a></li>
    </ul>

<?php endif; ?>
