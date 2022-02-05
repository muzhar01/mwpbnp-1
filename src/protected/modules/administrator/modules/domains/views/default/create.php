<?php
/* @var $this MwpDomainsController */
/* @var $model MwpDomains */

$this->breadcrumbs=array(
    'Domains'=>array('/administrator/domains/dashboard'),
	'Domain'=>array('index'),
	'Create',
);


?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create Domain</h3>
        </div>
        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
    </div>
</section>
