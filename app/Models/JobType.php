<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    use HasFactory;
    protected $table = 'job_type';

    protected $fillable = [
        'job_type_name',
        'job_category_id',
    ];

    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }
}
