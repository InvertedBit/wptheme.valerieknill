<div class="uk-container uk-margin-large-top">
    <div class="gallery-container uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-1@xs" data-uk-grid data-uk-lightbox>
<?php foreach ($this->data['entries'] as $entry): ?>
        <div>
            <div class="uk-card uk-card-secondary uk-card-small uk-card-hover card-clickable lightbox">
                <div class="uk-card-media-top uk-background-cover uk-height-medium" data-src="<?php echo $entry['image']; ?>" data-uk-img>
<?php if ($entry['sold']): ?>
                    <div class="sold-banner">Sold</div>
<?php endif; ?>
                    <a href="<?php echo $entry['image']; ?>" class="uk-cover-container" data-caption="<?php echo $entry['title'] . ( !empty($entry['dimensions']) ? ' (' . $entry['dimensions'] . ')' : '' ); ?>">
                    </a>
                </div>
                <div class="uk-card-body">
                    <a href="<?php echo $entry['image']; ?>" class="uk-cover-container">
                    <h3 class="uk-card-title"><?php echo $entry['title']; ?></h3>
                    </a>
                </div>
            </div>
        </div>

<?php endforeach; ?>
    </div>
</div>

