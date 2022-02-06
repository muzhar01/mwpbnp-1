<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php echo "<?php\n"; ?>
/* @var $this <?php echo $this->getControllerClass(); ?> */
/* @var $data <?php echo $this->getModelClass(); ?> */
?>
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">View <?php echo $this->modelClass . " <?php echo \$model->{$this->tableSchema->primaryKey}; ?>"; ?></h3>
        </div>
        <div class="box-body">
            <div class="view">
                <?php
                $count = 0;
                foreach ($this->tableSchema->columns as $column) {
                    if ($column->isPrimaryKey)
                        continue;
                    if (++$count == 7)
                        echo "\t<?php /*\n";
                    echo "\t<b><?php echo CHtml::encode(\$data->getAttributeLabel('{$column->name}')); ?>:</b>\n";
                    echo "\t<?php echo CHtml::encode(\$data->{$column->name}); ?>\n\t<br />\n\n";
                }
                if ($count >= 7)
                    echo "\t*/ ?>\n";
                ?>

            </div>
        </div>
    </div>
</section>