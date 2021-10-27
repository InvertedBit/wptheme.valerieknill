<form class="uk-grid" data-uk-grid="" action="<?php echo $this->data['action']; ?>" method="POST">
    <legend class="uk-legend uk-first-column"><?php echo _x('Contact me...', 'Contact form title', 'wptheme-valerieknill'); ?></legend>
        <div class="uk-width-1-2@s uk-width-1-1@xs uk-grid-margin uk-first-column">
            <input class="uk-input" type="text" name="from_name" placeholder="<?php echo __('Name', 'wptheme-valerieknill'); ?>">
        </div>
        <div class="uk-width-1-2@s uk-width-1-1@xs uk-grid-margin">
            <input class="uk-input" type="text" name="from_email" placeholder="<?php echo __('E-Mail', 'wptheme-valerieknill'); ?>">
        </div>
        <div class="uk-width-1-1 uk-grid-margin uk-first-column">
            <input class="uk-input" type="text" name="subject" placeholder="<?php echo __('Subject', 'wptheme-valerieknill'); ?>" />
        </div>
        <div class="uk-width-1-1 uk-grid-margin uk-first-column">
            <textarea class="uk-textarea" name="message" placeholder="<?php echo __('Message', 'wptheme-valerieknill'); ?>"></textarea>
        </div>
<?php do_action( 'anr_captcha_form_field' ); ?>
        <div class="uk-width-1-1 uk-grid-margin uk-first-column">
            <input type="submit" name="submit" class="uk-button uk-button-secondary uk-width-1-1" value="<?php echo __('Send', 'wptheme-valerieknill'); ?>" />
<?php if (!empty($this->data['error_message'])): ?>

<p class="uk-text-danger"><?php echo $this->data['error_message']; ?></p>

<?php endif; ?>

        </div>
</form>
