<div class="uk-card uk-card-secondary uk-card-hover card-clickable">
    <div class="uk-card-media-top">
        <a href="<?php echo $this->data['url']; ?>" class="uk-cover-container card-link">
            <img src="<?php echo $this->data['image']; ?>" alt="bild" />
        </a>
    </div>
    <div class="uk-card-body">
        <a href="<?php echo $this->data['url']; ?>" class="uk-cover-container">
        <h3 class="uk-card-title"><?php echo $this->data['title']; ?></h3>
        </a>
        <p><?php echo $this->data['description']; ?></p>
    </div>
</div>

