<?php

namespace DavidWeber\Dominion\Models;

class SelectOption extends Eloquent {

    protected $table = 'select_options';
    public $timestamps = true;
    protected $softDelete = false;
    protected $guarded = array('select_group_id');
    protected $fillable = array('name', 'value');
    protected $visible = array('name', 'value');
    protected $hidden = array('select_group_id');

    public function group() {
        return $this->hasOne('SelectGroup');
    }

}
