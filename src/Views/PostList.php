<?php foreach ($this->data['children'] as $key => $child): ?>
<?php if ($child->isValid()): ?>
            <div class="<?php echo (empty($this->data['div-classes'][$key])?'':$this->data['div-classes'][$key]); ?>">

<?php $child->render(); ?>

            </div>
<?php endif; ?>
<?php endforeach; ?>
