<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobListing extends Model
{
    use HasFactory;
    protected $table = 'job_listings';
    protected $fillable = [
        'job_category_id',
        'job_type_id',
        'title',
        'company_details',
        'tags',
        'skills',
        'experience_required',
        'description',
        'salary',
        'custom_fields',
    ];

    protected $casts = [
        'custom_fields' => 'array', // Cast JSON custom fields to array
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
