<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="fixed-header" class="fixed-header uk-position-fixed uk-position-center-top uk-width-1-1 hidden">
	<a href="index.html" class="uk-link-muted heading-logo-link uk-logo">
		<h1 class="uk-heading-small heading-logo">Valerie Knill</h1>
		<h3 class="uk-heading-xsmall heading-logo-sub">Painting</h3>
	</a>
	<a href="#" class="uk-icon-link uk-position-center-right navigation-button" data-uk-toggle="target: #main-navigation" data-uk-icon="icon: menu; ratio: 3"></a>
</div>
<div class="uk-section uk-light header-section header-background-slideshow" data-uk-slideshow="min-height: 300; autoplay:true; pause-on-hover: false; animation: push; autoplay-interval: 5000">
			<ul class="uk-slideshow-items">
                <?php
                    if (!empty($this->data['images'])):
                        foreach($this->data['images'] as $image):
                ?>
                        <li>
                            <img src="<?php echo $image; ?>" data-uk-cover />
                        </li>
                <?php
                        endforeach;
                    endif;
                ?>
			</ul>
			<div class="header-overlay">
				<a href="index.html" class="uk-link-muted heading-logo-link uk-logo">
					<h1 class="uk-heading-small heading-logo">Valerie Knill</h1>
					<h3 class="uk-heading-xsmall heading-logo-sub">Painting</h3>
				</a>
				
				<ul class="uk-slideshow-nav uk-dotnav uk-position-bottom-center uk-margin-bottom"></ul>

				<a href="#" class="uk-icon-link uk-position-top-right navigation-button" data-uk-toggle="target: #main-navigation" data-uk-icon="icon: menu; ratio: 3"></a>

			</div>
</div>
