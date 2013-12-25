<?php

namespace DavidWeber\Dominion\Models;

class SelectGroup extends DominionModel {

    protected $table = 'select_groups';
    public $timestamps = true;
    protected $fillable = array('name');
    protected $softDelete = false;

    public function options() {
        return $this->hasMany('DavidWeber\Dominion\Models\SelectOption');
    }

}
