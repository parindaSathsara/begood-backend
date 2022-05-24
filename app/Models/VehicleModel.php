<?php



namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class VehicleModel extends Model{
    use HasApiTokens, HasFactory;

    protected $table="vehicles";

    protected $fillable=[
        'vehicleid',
        'vehiclenumberplate',
        'vehicletype'
    ];

    public $timestamps=false;

    
}




?>