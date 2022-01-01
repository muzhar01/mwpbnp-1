<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs = array(
                    'News' => array('index'),
                    $model->title,
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">View News #<?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">
            <?php
            $this->widget ('zii.widgets.CDetailView', array(
                                'data' => $model,
                                'attributes' => array(
                                                    'id',
                                                    array('type' => 'Raw', 'name' => 'cat_id', 'value' => $model->category->name),
                                                    'title',
                                                    array('type' => 'Raw', 'name' => 'intro_text', 'value' => $model->intro_text),
                                                    array('type' => 'Raw', 'name' => 'desc', 'value' => $model->desc),
                                                    'created_date',
                                                    array('type' => 'Raw', 'name' => 'published', 'value' => ($model->published) ? "Yes" : "<span style=\"color:#f00\">No</span>"),
                                ),
            ));
            ?>
        </div>
    </div>
</section>

