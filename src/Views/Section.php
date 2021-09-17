<div class="<?php echo implode(' ', $this->data['classes']); ?>">
<?php
foreach ($this->data['components'] as $component) {
    $component->render();
}
?>
</div>
