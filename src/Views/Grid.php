<div class="uk-container uk-margin-large-top">
<?php if (!empty($this->data['filter']) && count($this->dataSource->getFromList('terms')) > 0): ?>
    <div data-uk-filter="target: .filter-container">
        <ul class="uk-subnav uk-subnav-pill">
            <li class="uk-active" data-uk-filter-control><a href="#">Alle</a></li>
<?php foreach ($this->dataSource->getFromList('terms')[$this->data['filter']['taxonomy']] as $term): ?>
            <li data-uk-filter-control=".<?php echo $term->slug; ?>"><a href="#"><?php echo $term->name; ?></a></li>
<?php endforeach; ?>
        </ul>
<?php endif; ?>
        <div class="filter-container uk-child-width-1-3@m uk-child-width-1-2@s uk-child-width-1-1@xs" data-uk-grid>
<?php foreach ($this->data['children'] as $child): ?>
<?php if (!empty($this->data['filter'])): ?>
            <div class="<?php foreach ($child->dataSource->terms[$this->data['filter']['taxonomy']] as $term) { echo $term->slug . ' '; } ?>">
<?php else: ?>
            <div>
<?php endif; ?>

<?php $child->render(); ?>

            </div>
<?php endforeach; ?>
        </div>
<?php if (!empty($this->data['filter'])): ?>
    </div>
<?php endif; ?>
</div>
