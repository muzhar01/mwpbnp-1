<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class UploadFile extends CFileValidator
{
    public $file;
    // ... other attributes
 
    public function rules()
    {
        return array(
            array('file', 'file', 'types'=>'jpg, gif, png'),
        );
    }
}
?>
