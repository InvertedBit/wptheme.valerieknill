<?php if (!empty($this->data['title'])): ?>
<h3 class="uk-heading-small"><?php echo $this->data['title']; ?></h3>
<?php endif; ?>
<table class="uk-table uk-table-divider">
    <tbody>
<?php foreach ($this->data['rows'] as $row): ?>

        <tr>
<?php foreach ($row as $cell): ?>

<?php echo "<{$cell['tag']}>{$cell['value']}</{$cell['tag']}>"; ?>

<?php endforeach; ?>
        </tr>

<?php endforeach; ?>
    </tbody>
</table>
