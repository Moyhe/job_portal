<?php

namespace App\Post;

use App\Models\Listing;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

final class JobPost
{
    protected $listing;
    public function __construct(Listing $listing)
    {
        $this->listing  = $listing;
    }

    public function store(): void
    {
        Listing::create([

            'feature_image' => request()->file('feature_image')->store('images') ?? false,
            'user_id' => request()->user()->id,
            'title' => request('title'),
            'description' => request('description'),
            'slug' => Str::slug(request('title')) . '.' . Str::uuid(),
            'roles' => request('roles'),
            'job_type' => request('job_type'),
            'experience' => request('experience'),
            'other_benifits' => request('other_benifits'),
            'vacancy' => request('vacancy'),
            'company' => request('company'),
            'gender' => request('gender'),
            'education_experience' => request('education_experience'),
            'job_region' => request('job_region'),
            'application_close_date' => Carbon::createFromFormat('d/m/Y', request('date'))->format('Y-m-d'),
            'salary' => request('salary'),

        ]);
    }


    public function updateJob(string $id, Request $data): void
    {

        $job =  $this->listing->find($id);

        $attributes = $data->validate([
            'title' => 'required|min:5',
            'feature_image' => 'mimes:png,jpg,jpeg|max:2048|image',
            'description' => 'required|min:10',
            'roles' => 'required|min:10',
            'job_type' => 'required',
            'job_region' => 'required',
            'education_experience' => 'required',
            'gender' => 'required',
            'other_benifits' => 'required',
            'experience' => 'required',
            'vacancy' => 'required',
            'company' => 'required',
            'date' => 'required',
            'salary' => 'required'
        ]);

        if ($attributes['feature_image'] ?? false) {
            if ($job->feature_image) {
                Storage::disk('public')->deleteDirectory(dirname($job->image));
            }
            $attributes['feature_image'] = request()->file('feature_image')->store('images');
        }

        $job->update($attributes);
    }
}
