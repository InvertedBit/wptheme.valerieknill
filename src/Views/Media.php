<div class="uk-container main-section">
    <h1 class="uk-heading-large uk-text-bold introduction-title">Projekt A</h1>
<?php if ($this->data['mediaType'] === 'video' && $this->data['sourceType'] === 'wp'): ?>
    <video src="<?php echo $this->data['source']; ?>" controls playsinline data-uk-video></video>
<?php endif; ?>
</div>

