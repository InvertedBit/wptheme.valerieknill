<?php if ($this->isValid()): ?>
        <h1 class="uk-heading-large introduction-title"><?php echo $this->data['title']; ?></h1>
<?php  if (!empty($this->data['subtitle'])): ?>
        <div class="uk-text-lead introduction-lead">
            <?php echo $this->data['subtitle']; ?>
        </div>
<?php  endif; ?>
<?php if (!empty($this->data['introduction'])): ?>
        <div class="introduction-text">
            <?php echo $this->data['introduction']; ?>
        </div>
<?php  endif; ?>
<?php endif; ?>
