<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Car extends Model
{
    use HasFactory;

    protected $table = 'cars';
    protected $primaryKey = 'id';
    
    protected $fillable = ['name','founded', 'description','image_path'];

    //protected $hidden = ['id','name','founded'];
    //protected $visible = ['name','founded','description'];
    public function carModels(){
        return $this->hasMany(CarModel::class);
    }

    public function headquarter(){
        return $this->hasOne(Headquarter::class);
    }
     public function engines(){
        return $this->hasManyThrough(
            Engine::class,
            CarModel::class,
             'car_id',
             'model_id'
    );
     }

     public function productionDate()
     {
          return $this->hasOneThrough(
            CarProductionDate::class,
            CarModel::class,
            'car_id',
            'model_id'
          );
     }
     public function products()
     {
        return $this->belongsToMany(Product::class);
     }
}
