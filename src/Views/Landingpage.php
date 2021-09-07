<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <div class="uk-section uk-section-secondary landingpage-section uk-light">
        <div class="title-logo">
            <h1 class="uk-heading-large heading-logo"><?php echo $this->data['title']; ?></h1>
        </div>
        <div class="link-container">
            <div class="link-painting link" style="background-image: url('<?php echo $this->data['link_left']['image']; ?>');"><a class="link-text" href="<?php echo $this->data['link_left']['page_link']; ?>"><?php echo $this->data['link_left']['text']; ?></a></div>
            <div class="link-movies link" style="background-image: url('<?php echo $this->data['link_right']['image']; ?>');"><a class="link-text" href="<?php echo $this->data['link_right']['page_link']; ?>"><?php echo $this->data['link_right']['text']; ?></a></div>
        </div>
    </div>

</body>
</html>
