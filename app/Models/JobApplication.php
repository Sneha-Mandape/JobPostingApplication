<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $fillable = [
       'candidate_id', 'name', 'email', 'why_hire', 'resume', 'status'
    ];

    public function job()
    {
        return $this->belongsTo(JobListing::class, 'job_id');
    }

    public function rejectionMsg()
    {
        return $this->belongsTo(RejectionMessage::class, 'application_id');
    }
}
