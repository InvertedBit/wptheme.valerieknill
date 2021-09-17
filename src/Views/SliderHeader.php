<div id="fixed-header" class="fixed-header uk-position-fixed uk-position-center-top uk-width-1-1 hidden">
<?php
$logoText = explode(' ', $this->data['blog_title']);
?>
    <a href="<?php echo $this->data['home_link']; ?>" class="uk-link-muted heading-logo-link uk-logo">
    <div class="logo-part logo-top"><?php echo $logoText[0]; ?></div>
<div class="logo-part logo-middle"><?php echo $logoText[1]; ?></div>
<div class="logo-part logo-<?php echo $this->data['discipline']; ?> logo-bottom"><?php echo $this->data['blog_subtitle']; ?></div>
    </a>
<!--
	<a href="<?php echo $this->data['home_link']; ?>" class="uk-link-muted heading-logo-link uk-logo">
		<h1 class="uk-heading-small heading-logo">Valerie Knill</h1>
		<h3 class="uk-heading-xsmall heading-logo-sub">Painting</h3>
	</a>
-->
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
<?php
$logoText = explode(' ', $this->data['blog_title']);
?>
    <a href="<?php echo $this->data['home_link']; ?>" class="uk-link-muted heading-logo-link uk-logo">
    <div class="logo-part logo-top"><?php echo $logoText[0]; ?></div>
<div class="logo-part logo-middle"><?php echo $logoText[1]; ?></div>
<div class="logo-part logo-<?php echo $this->data['discipline']; ?> logo-bottom"><?php echo $this->data['blog_subtitle']; ?></div>
    </a>
<!--
				<a href="<?php echo $this->data['home_link']; ?>" class="uk-link-muted heading-logo-link uk-logo">
					<h1 class="uk-heading-small heading-logo">Valerie Knill</h1>
					<h3 class="uk-heading-xsmall heading-logo-sub">Painting</h3>
				</a>
-->
				
				<ul class="uk-slideshow-nav uk-dotnav uk-position-bottom-center uk-margin-bottom"></ul>

				<a href="#" class="uk-icon-link uk-position-top-right navigation-button" data-uk-toggle="target: #main-navigation" data-uk-icon="icon: menu; ratio: 3"></a>

			</div>
</div>

