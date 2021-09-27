<div class="uk-container <?php echo $this->data['styleClasses']; ?>">

<?php foreach ($this->data['children'] as $child): ?>

<?php $child->render(); ?>
<?php endforeach; ?>

</div>

