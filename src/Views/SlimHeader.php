<div id="fixed-header" class="fixed-header uk-position-fixed uk-position-center-top uk-width-1-1 hidden">
<?php
$logoText = explode(' ', $this->data['blog_title']);
?>
    <a href="<?php echo $this->data['home_link']; ?>" class="uk-link-muted heading-logo-link uk-logo">
    <div class="logo-part logo-top"><?php echo $logoText[0]; ?></div>
<div class="logo-part logo-middle"><?php echo $logoText[1]; ?></div>
<div class="logo-part logo-<?php echo $this->data['discipline']; ?> logo-bottom"><?php echo $this->data['blog_subtitle']; ?></div>
    </a>
	<a href="#" class="uk-icon-link uk-position-center-right navigation-button" data-uk-toggle="target: #main-navigation" data-uk-icon="icon: menu; ratio: 3"></a>
</div>
<div class="uk-section uk-light uk-background-cover uk-background-secondary uk-background-fixed header-section header-background" style="background-image: url('<?php echo $this->data['header_image']; ?>')">
        <div class="uk-cover-container uk-width-fill uk-height-fill uk-inline">
<?php
$logoText = explode(' ', $this->data['blog_title']);

?>
    <a href="<?php echo $this->data['home_link']; ?>" class="uk-link-muted heading-logo-link uk-logo">
    <div class="logo-part logo-top"><?php echo $logoText[0]; ?></div>
<div class="logo-part logo-middle"><?php echo $logoText[1]; ?></div>
<div class="logo-part logo-<?php echo $this->data['discipline']; ?> logo-bottom"><?php echo $this->data['blog_subtitle']; ?></div>
    </a>
            <a href="#" class="uk-icon-link uk-position-top-right navigation-button" data-uk-toggle="target: #main-navigation" data-uk-icon="icon: menu; ratio: 3"></a>
        </div>
</div>

