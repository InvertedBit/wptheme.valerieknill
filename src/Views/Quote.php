<blockquote>
    <p class="uk-margin-small-bottom"><?php echo $this->data['quote']; ?></p>
<?php if ($this->data['sourceType'] === 'web'): ?>
    <footer><cite><a href="<?php echo $this->data['sourceWeb']; ?>"><?php echo $this->data['quotee']; ?></a></cite></footer>
<?php elseif ($this->data['sourceType'] === 'print'): ?>
    <footer><cite><?php echo $this->data['quotee']; ?> (<?php echo $this->data['sourcePrint']; ?>)</cite></footer>

<?php else: ?>
    <footer><cite><?php echo $this->data['quotee']; ?></cite></footer>

<?php endif; ?>
</blockquote>

