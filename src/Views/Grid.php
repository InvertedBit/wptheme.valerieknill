<div class="uk-container uk-margin-large-top">
<?php if (!empty($this->data['title'])): ?>
<h3 class="uk-heading-small"><?php echo $this->data['title']; ?></h3>
<?php endif; ?>
<?php if (!empty($this->data['filter']) && count($this->dataSource->getFromList('terms')) > 0): ?>
    <div data-uk-filter="target: .filter-container">
        <ul class="uk-subnav uk-subnav-pill">
            <li class="uk-active" data-uk-filter-control><a href="#">Alle</a></li>
<?php foreach ($this->dataSource->getFromList('terms')[$this->data['filter']['taxonomy']] as $term): ?>
            <li data-uk-filter-control=".<?php echo $term->slug; ?>"><a href="#"><?php echo $term->name; ?></a></li>
<?php endforeach; ?>
        </ul>
<?php endif; ?>
        <div class="filter-container <?php echo $this->data['uk-child-width']; ?>" data-uk-grid>
<?php foreach ($this->data['children'] as $child): ?>
<?php if ($child->isValid()): ?>
<?php if (!empty($this->data['filter'])): ?>
            <div class="<?php foreach ($child->dataSource->terms[$this->data['filter']['taxonomy']] as $term) { echo $term->slug . ' '; } ?>">
<?php else: ?>
            <div>
<?php endif; ?>

<?php $child->render(); ?>

            </div>
<?php endif; ?>
<?php endforeach; ?>
        </div>
<?php if (!empty($this->data['filter'])): ?>
    </div>
<?php endif; ?>
</div>
