<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Person extends Model
{
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::addGrobalScope('age', function(Builder $builder){
    //         $builder->where('age', '>', 20);
    //     });
    // }

    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150',
    );

    public function board()
    {
        return $this->hasOne('App\Board');
    }

    public function boards()
    {
        return $this->hasMany('App\Board');
    }

    public function getData(){
        return $this->id . ': ' . $this->name . ' (' . $this->age . ")";
    }

    public function scopeNameEqual($query, $str){
        return $query->where('name', $str);
    }

    public static function scopeAgeGreaterThan($query, $n)
    {
        return $query->where('age', '>=', $n);
    }

    public static function scopeAgeLessThan($query, $n)
    {
        return $query->where('age', '<=', $n);
    }
}
