<div id="main-navigation" data-uk-offcanvas="flip: true;mode: push">
	<div class="uk-offcanvas-bar uk-flex uk-flex-column">
		<ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical">
			<li><a href="#" class="uk-icon-link" data-uk-icon="icon: close; ratio: 2" data-uk-toggle="target: #main-navigation"></a></li>
			<li class="uk-nav-divider"></li>
            <?php
                foreach ($this->data['items'] as $item):
            ?>
                <li <?php $item['active']?'class="uk-active"':'' ?>>
                    <a href="<?php echo $item['url']; ?>">
                        <?php echo $item['title']; ?>
                    </a>
                </li>

            <?php
                endforeach;
            ?>
<!--
			<li class="uk-active"><a href="index.html">Home</a></li>
			<li><a href="news.html">News</a></li>
			<li><a href="about.html">Über mich</a></li>
			<li><a href="gallery.html">Gallerie</a></li>
			<li><a href="expositions.html">Ausstellungen</a></li>
			<li><a href="contact.html">Kontakt</a></li>
            -->
		</ul>
	</div>
</div>