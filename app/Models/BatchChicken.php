<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchChicken extends Model
{
    use HasFactory;

    // Define the table name explicitly if it doesn't follow Laravel's naming convention
    protected $table = 'batch_chicken';

    // Specify the primary key column name
    protected $primaryKey = 'batch_id';

    // Define the fillable fields
    protected $fillable = [
        'batch_name',
        'arrival_date',
        'supplier_name',
        'quantity',
        'price',
        'status',
        'batch_image',
    ];

    // Define default values for attributes if necessary
    protected $attributes = [
        'status' => 'Processing',
    ];
}
