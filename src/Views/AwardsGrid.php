<div class="uk-child-width-1-4@m uk-child-width-1-3@s uk-child-width-1-2@xs" data-uk-grid>
<?php foreach ($this->data['projects'] as $project): ?>
<div class="uk-width-1-1">
<h1><?php echo $project['name']; ?></h1>
</div>
    <?php foreach ($project['awards'] as $award): ?>

    <div>


        <img src="<?php echo $award['plaque']['url']; ?>" alt="<?php echo $award['plaque']['alt']; ?>" data-uk-img />

    </div>
    <?php endforeach; ?>

<?php endforeach; ?>
</div>
