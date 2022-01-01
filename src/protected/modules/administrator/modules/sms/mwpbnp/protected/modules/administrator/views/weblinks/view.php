<?php
/* @var $this WeblinksController */
/* @var $model Weblinks */

$this->breadcrumbs = array(
                    'Weblinks' => array('index'),
                    $model->title,
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">View Weblinks #<?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">
<?php
$this->widget ('zii.widgets.CDetailView', array(
                    'data' => $model,
                    'attributes' => array(
                                        'id',
                                        'title',
                                        'url',
                                        'type',
                                        array('type' => 'Raw', 'name' => 'published', 'value' => ($model->published) ? "Yes" : "<span style=\"color:#f00\">No</span>"),
                                        'order',
                                        'created_date',
                    ),
));
?></div></div></section>
