<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrientationSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant_id',
        'orientation_date',
        'orientation_time',
        'orientation_platform',
        'meeting_link',
        'meeting_id',
        'meeting_password',
        'notes',
    ];

    /**
     * Get the applicant associated with this orientation schedule.
     */
    public function applicant()
    {
        return $this->belongsTo(ApplicationForm::class, 'applicant_id');
    }
}
