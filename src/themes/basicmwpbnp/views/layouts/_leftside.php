
<aside class="">
    <div class="sidebar-iframe">
        <?php if (!yii::app()->user->isGuest) {
            $this->widget('UserMenu');
            }

         $this->widget('Externallinks', array('name' => 'Intro Links'));
        ?>

 </aside>
