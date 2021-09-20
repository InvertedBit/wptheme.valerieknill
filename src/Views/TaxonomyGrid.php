<div class="uk-container uk-margin-large-top">
    <div class="gallery-container uk-child-width-1-2@m uk-child-width-1-1@s" data-uk-grid>
<?php foreach($this->data['entries'] as $entry): ?>
        <div>
            <div class="uk-card uk-card-secondary uk-card-hover card-clickable">
                <div class="uk-card-media-top">
                    <a href="<?php echo $entry['url']; ?>" class="uk-cover-container card-link">
                        <img src="<?php echo $entry['titleImage']; ?>" alt="bild" />
                    </a>
                </div>
                <div class="uk-card-body">
                    <a href="<?php echo $entry['url']; ?>" class="uk-cover-container">
                    <h3 class="uk-card-title"><?php echo $entry['title']; ?></h3>
                    </a>
                    <p><?php echo $entry['description']; ?></p>
                </div>
            </div>
        </div>
<?php endforeach; ?>
    </div>
</div>
