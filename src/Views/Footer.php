<div class="uk-section uk-section-secondary uk-dark footer-section">
    <hr class="uk-divider-icon" />
    <div class="uk-container">
        <div class="uk-child-width-1-3 footer-grid" data-uk-grid>
<?php foreach ($this->data['items'] as $item): ?>
            <div>
            <a class="footer-link" href="<?php echo add_query_arg('discipline', $item['discipline'], $item['url']); ?>"><?php echo $item['title']; ?></a>
            </div>

<?php endforeach; ?>
            <div class="uk-width-1-1">
                <span>Copyright 2021 Valerie Knill</span>
            </div>
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>
