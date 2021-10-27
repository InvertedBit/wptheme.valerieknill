<div class="uk-section <?php echo $this->data['styleClasses']; ?>">
<?php
foreach ($this->data['components'] as $component) {
    $component->render();
}
?>
</div>
