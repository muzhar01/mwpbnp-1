<?php
/* @var $this MembersController */
/* @var $model Members */

$this->breadcrumbs = array(
    'Members' => array('index'),
    $model->id,
);
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Members #<?php echo $model->id; ?></h3>
        </div>
        <div class="box-body">
            <?php $this->widget('zii.widgets.CDetailView', array(
                'data' => $model,
                'attributes' => array(
                    'id',
                    'fname',
                    'lname',
                    'username',
                    'address',
                    'zone',
                    'area',
                    'sales_officer',
                    array('type' => 'Raw', 'name' => 'email', 'value' => ($model->verify_email) ? $model->email . " <i class=\"fa fa-check\" title=\"Verified\"></i>" : $model->email),
                    array('type' => 'Raw', 'name' => 'cellular', 'value' => ($model->verify_sms) ? $model->cellular . " <i class=\"fa fa-check\" title=\"Verified\"></i>" : $model->cellular),
                    array('type' => 'Raw', 'name' => 'cnic', 'value' => ($model->verify_cnic) ? $model->cnic . " <i class=\"fa fa-check\" title=\"Verified\"></i>" : $model->cnic),
                    array('type' => 'Raw', 'name' => 'company_ntn_no', 'value' => ($model->verify_company_ntn) ? $model->company_ntn_no . " <i class=\"fa fa-check\" title=\"Verified\"></i>" : $model->company_ntn_no),
                    array('type' => 'Raw', 'name' => 'company_gst_no', 'value' => ($model->verify_company_gst) ? $model->company_gst_no . " <i class=\"fa fa-check\" title=\"Verified\"></i>" : $model->company_gst_no),

                    'city',
                    'zipcode',
                    'phone_office',
                    'fax_no',
                    'phone_res',
                    'cellular2',
                    'cellular3',
                    'company_name',
                    'company_no',
                    'job_title',
                    array('header' => 'Status', 'type' => 'Raw', 'name' => 'status', 'value' => ($model->status) ? "Active" : "<span style=\"color:#f00\">Suspend</span>"),

                    'created_date',
                    'secret_key',
                    array('header' => 'Enable', 'type' => 'Raw', 'name' => 'is_enable', 'value' => ($model->is_enable) ? "Active" : "<span style=\"color:#f00\">Suspend</span>"),

                    'type',
                ),
            )); ?>
        </div>
    </div>
</section>