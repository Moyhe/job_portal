<?php

namespace App\Post;

use App\Models\Listing;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class JobPost
{
    protected $listing;
    public function __construct(Listing $listing)
    {
        $this->listing  = $listing;
    }

    public function store(): void
    {
        Listing::create([

            'feature_image' => request()->file('feature_image')->store('images'),
            'user_id' => request()->user()->id,
            'title' => request('title'),
            'description' => request('description'),
            'roles' => request('roles'),
            'job_type' => request('job_type'),
            'address' => request('address'),
            'application_close_date' => Carbon::createFromFormat('d/m/Y', request('date'))->format('Y-m-d'),
            'salary' => request('salary'),
            'slug' => Str::slug(request('title')) . '.' . Str::uuid(),
        ]);
    }


    public function updateJob(string $id, Request $data): void
    {
        if ($data['feature_image'] ?? false) {
            $data['feature_image'] = request()->file('feature_image')->store('images');
        }

        $attributes = $data->validate([
            'title' => 'required|min:5',
            'feature_image' => 'mimes:png,jpg,jpeg|max:2048',
            'description' => 'required|min:10',
            'roles' => 'required|min:10',
            'job_type' => 'required',
            'address' => 'required',
            'date' => 'required',
            'salary' => 'required'
        ]);

        $this->listing->find($id)->update($attributes);
    }
}
