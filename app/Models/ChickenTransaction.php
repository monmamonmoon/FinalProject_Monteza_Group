<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChickenTransaction extends Model
{
    use HasFactory;

    // Define the table name explicitly if it doesn't follow Laravel's naming convention
    protected $table = 'chicken_transaction';

    // Specify the primary key column name
    protected $primaryKey = 'id';

    // Define the fillable fields
    protected $fillable = [
        'batch_id', 
        'user_id', 
        'quantity', 
        'price_each', 
        'total',
    ];

    // Define the relationship with BatchChicken
    public function batchChicken()
    {
        return $this->belongsTo(BatchChicken::class, 'batch_id', 'batch_id');
    }

    // Define the relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Optionally, if you want to calculate the total dynamically, you can define an accessor
    public function getTotalAttribute()
    {
        return $this->quantity * $this->price_each;
    }
}
