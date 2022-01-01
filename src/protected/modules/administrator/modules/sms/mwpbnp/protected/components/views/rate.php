<div class="accordion-outer" style="height: 600px; overflow:scroll">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <?php
            $this->widget('zii.widgets.CListView', array(
                'dataProvider' => $dataProvider,
                'itemView' => '_view',
                'template' => '{pager}{items}',
            ));
            ?>
        </div>
    </div>
</div>