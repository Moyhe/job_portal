<?php

namespace App\Models;

use App\Traits\GetImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Listing extends Model
{
    use HasFactory, GetImage;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'slug',
        'feature_image',
        'roles',
        'experience',
        'education_experience',
        'other_benifits',
        'gender',
        'vacancy',
        'company',
        'job_type',
        'job_region',
        'salary',
        'application_close_date',


    ];

    /**
     * The users that belong to the Listing
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'listing_user', 'listing_id', 'user_id')
            ->withPivot('shortlisted')
            ->withTimestamps();
    }

    /**
     * Get the profile that owns the Listing
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['title'] ?? false,
            fn($query, $search) =>
            $query->where(
                fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
            )
        );

        $query->when(
            $filters['region'] ?? false,
            fn($query, $search) =>
            $query->where(
                fn($query) =>
                $query->Where('job_region', 'like', '%' . $search . '%')

            )
        );

        $query->when(
            $filters['job_type'] ?? false,
            fn($query, $search) =>
            $query->where(
                fn($query) =>
                $query->Where('job_type', 'like', '%' . $search . '%')
            )
        );
    }
}
