<div class="input-group date">
    <div class="input-group-addon">
        <i class="fa fa-calendar"></i>
    </div>
    <input type="text" class="timepicker form-control" id="<?php echo $this->id; ?>" value="<?php echo $this->model->{$this->name}?$this->model->{$this->name}:$this->options['value']; ?>" name="<?php echo get_class($this->model).(!empty($this->options['tabularLevel'])?$this->options['tabularLevel']:'').'['.$this->name.']'; ?>" />
</div>