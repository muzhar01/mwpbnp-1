<?php if($googleAPI){
    $this->widget('ext.chartswidgets.Chartswidgets',  array(
    'type'=>'ga:browser',
    'script'=>'browser',
    'title'=>'Browsers',
    ));
}else{ ?>
<div>
    <div class="text">
        <table class="myChart">
            <thead>
                <tr>
                    <th></th>
                    <?php
                    foreach ($browsers as $data) {
                        echo '<th>' . $data['browser'] . '</th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Browsers</th>
                    <?php
                    foreach ($browsers as $view) {
                        echo '<td>' . $view['views'] . '</td>';
                    }
                    ?>
                </tr> 
            </tbody>
        </table>
    </div>
</div>
<?php } ?>
