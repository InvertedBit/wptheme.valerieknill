<?php if (count($this->data['exhibitions']) > 0): ?>
    <div class="uk-container uk-margin-large-top">
        <h3 class="uk-heading"><?php echo __('Current exhibitions', 'wptheme-valerieknill'); ?></h3>
        <div class="uk-position-relative uk-visible-toggle" tabindex="-1" data-uk-slider="autoplay: true; pause-on-hover: true; autoplay-interval:2000">
            <ul class="uk-slider-items uk-grid uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-1@xs">
<?php foreach ($this->data['exhibitions'] as $exhibition): ?>
                <li>
                    <div class="uk-card uk-card-primary uk-card-body">
                        <h3 class="uk-card-title"><?php echo $exhibition['name']; ?></h3>
                        <p><?php echo $exhibition['description']; ?></p>
                        <p><?php echo $exhibition['address']; ?></p>
                        <p><?php printf(_x('From %s to %s', 'Exhibition card from to', 'wptheme-valerieknill'), $exhibition['from'], $exhibition['to']); ?></p>
                    </div>
                </li>
<?php endforeach; ?>
            </ul>
            <a href="#" data-uk-slider-item="previous" class="uk-position-center-left uk-hidden-hover" data-uk-slidenav-previous></a>
            <a href="#" data-uk-slider-item="next" class="uk-position-center-right uk-hidden-hover" data-uk-slidenav-next></a>
        </div>
    </div>

<?php endif; ?>
<?php if (count($this->data['exhibitions_closed']) > 0): ?>

    <div class="uk-container uk-margin-large-top">
        <h3 class="uk-heading"><?php echo __('Past exhibitions', 'wptheme-valerieknill');?></h3>
        
        <ul class="uk-list uk-list-striped">
<?php foreach ($this->data['exhibitions_closed'] as $exhibition): ?>
            <li>
                <div>
                    <h6><?php echo $exhibition['name']; ?></h6>
                    <p><?php echo $exhibition['description']; ?></p>
                </div>
            </li>
<?php endforeach; ?>
        </ul>
    </div>

<?php endif; ?>
