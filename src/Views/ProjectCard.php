<div class="uk-card uk-card-secondary uk-card-hover card-clickable">
    <div class="uk-card-media-top">
        <a href="<?php echo get_permalink($this->dataSource->ID); ?>" class="uk-cover-container card-link">
            <img src="<?php echo $this->dataSource->poster_image['url']; ?>" alt="<?php echo $this->dataSource->poster_image['title']; ?>" />
        </a>
    </div>
    <div class="uk-card-body">
        <a href="project-detail.html" class="uk-cover-container">
        <h3 class="uk-card-title"><?php echo $this->dataSource->post_title; ?></h3>
        </a>
        <p><?php echo $this->dataSource->logline; ?></p>
    </div>
</div>
