<div class="uk-container main-section">
    <h1 class="uk-heading-large uk-text-bold introduction-title">Projekt A</h1>
<?php if ($this->data['mediaType'] === 'video' && $this->data['sourceType'] === 'wp'): ?>
    <video src="<?php echo $this->data['source']; ?>" controls playsinline data-uk-video></video>
<?php elseif ($this->data['mediaType'] === 'video' && $this->data['sourceType'] === 'link' && !empty($this->data['embed'])): ?>
    <?php if ($this->data['embed']['platform'] === 'vimeo'): ?>
        <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/<?php echo $this->data['embed']['code']; ?>?autoplay=1&color=5AE653&portrait=0" style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe></div><script src="https://player.vimeo.com/api/player.js"></script>
    <?php elseif ($this->data['embed']['platform'] === 'youtube'): ?>

        <div style="padding:56.25% 0 0 0;position:relative;"><iframe width="560" height="315" style="position:absolute;top:0;left:0;width:100%;height:100%;" src="https://www.youtube-nocookie.com/embed/<?php echo $this->data['embed']['code']; ?>?modestbranding=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
    <?php endif ?>
<?php elseif ($this->data['mediaType'] === 'image'): ?>
<img style="width:100%;" src="<?php echo $this->data['source']; ?>" />
<?php endif; ?>
</div>

