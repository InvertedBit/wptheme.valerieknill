<div class="uk-container">
    <ul class="uk-breadcrumb breadcrumb-primary">
    <?php foreach ($this->data['breadcrumb'] as $name => $link): ?>
    <?php if ($link): ?>
        <li><a href="<?php echo $link; ?>"><?php echo $name; ?></a></li>
    <?php else: ?>
        <li><span><?php echo $name; ?></span></li>
    <?php endif; ?>
    <?php endforeach; ?>
    </ul>
</div>
