<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;
    protected $table = 'job_categories';
    protected $fillable = [
        'name',
    ];

    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id');
    }

    public function jobType()
    {
        return $this->belongsTo(jobType::class, 'job_type_id');
    }
}
