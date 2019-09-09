<?php if($googleAPI){
    $this->widget('ext.chartswidgets.Chartswidgets',  array(
    'type'=>'ga:operatingSystem',
    'script'=>'os',
    'title'=>'Operating System',
     )); 
}else{ ?>    
<div>
        <div class="text">
            <table class="myChart">
                <thead>
                    <tr>
                        <th></th>
                        <?php
                        foreach ($os as $data) {
                            echo '<th>' . $data['os'] . '</th>';
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Operating Systems</th>
                        <?php
                        foreach ($os as $view) {
                            echo '<td>' . $view['views'] . '</td>';
                        }
                        ?>
                    </tr> 
                </tbody>
            </table>
        </div>
    </div>
<?php } ?>
