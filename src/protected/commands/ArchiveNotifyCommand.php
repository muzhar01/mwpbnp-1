<?php
class ArchiveNotifyCommand extends CConsoleCommand {
    public function getHelp() {
        echo "Generate Archive";
    }
    public function run($args) {
        $model= Products::model()->findAll();
        foreach ($model as $row){
            Products::model()->saveArchivePrice($row->id);
        }
        echo 'done';
    }

    


}

