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
                <h1 class="uk-heading-small heading-logo"><?php echo $this->data['blog_title']; ?></h1>
                <h3 class="uk-heading-xsmall heading-logo-sub"><?php echo $this->data['blog_subtitle']; ?></h3>
            </a>
-->
            <a href="#" class="uk-icon-link uk-position-center-right navigation-button" data-uk-toggle="target: #main-navigation" data-uk-icon="icon: menu; ratio: 3"></a>
        </div>
        <div class="uk-section uk-light uk-background-cover uk-background-secondary header-section uk-padding-none uk-background-fixed uk-background-blend-soft-light header-video">
            <div class="uk-cover-container uk-height-medium uk-margin-none">
                <video src="<?php echo $this->data['header_video']; ?>" loop data-uk-cover></video>
                <div class="header-overlay uk-height-1-1 uk-width-1-1">
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
                        <h1 class="uk-heading-small heading-logo"><?php echo $this->data['blog_title']; ?></h1>
                        <h3 class="uk-heading-xsmall heading-logo-sub"><?php echo $this->data['blog_subtitle']; ?></h3>
                    </a>
-->
                    <a href="#" class="uk-icon-link uk-position-top-right navigation-button" data-uk-toggle="target: #main-navigation" data-uk-icon="icon: menu; ratio: 3"></a>
                </div>
            </div>
        </div>
