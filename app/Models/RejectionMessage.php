<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RejectionMessage extends Model
{
    use HasFactory;
    protected $table = 'rejection_messages';

    protected $fillable = ['application_id', 'message'];

    public function jobApplication()
    {
        return $this->belongsTo(JobApplication::class, 'application_id');
    }
}
