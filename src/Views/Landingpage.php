    <div class="uk-section uk-section-secondary landingpage-section uk-light">
        <div class="title-logo">
<?php
$logoText = explode(' ', $this->data['title']);
?>
    <div class="uk-link-muted heading-logo-link uk-logo heading-logo-large-center">
    <div class="logo-part logo-top"><?php echo $logoText[0]; ?></div>
<div class="logo-part logo-middle"><?php echo $logoText[1]; ?></div>
    </div>
<!--
            <h1 class="uk-heading-large heading-logo"><?php echo $this->data['title']; ?></h1>
-->
        </div>
        <div class="link-container">
            <div class="link-painting link" style="background-image: url('<?php echo $this->data['link_left']['image']; ?>'); background-position-x: <?php echo $this->data['link_left']['image_position_x']; ?>; background-position-y: <?php echo $this->data['link_left']['image_position_y']; ?>"><a class="link-text" href="<?php echo $this->data['link_left']['page_link']; ?>"><?php echo $this->data['link_left']['text']; ?></a></div>
            <div class="link-movies link" style="background-image: url('<?php echo $this->data['link_right']['image']; ?>'); background-position-x: <?php echo $this->data['link_right']['image_position_x']; ?>; background-position-y: <?php echo $this->data['link_right']['image_position_y']; ?>"><a class="link-text" href="<?php echo $this->data['link_right']['page_link']; ?>"><?php echo $this->data['link_right']['text']; ?></a></div>
        </div>
    </div>

</body>
</html>
