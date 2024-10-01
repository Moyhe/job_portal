<?php

namespace App\Http\Controllers;

use App\Models\JobSave;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobSaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $header = 'Job Save';

        $jobSaved = JobSave::query()
            ->where('user_id', Auth::user()->id)
            ->paginate(3);

        return view('seeker.job-saved', compact('jobSaved', 'header'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function jobSave(Request $request)
    {
        $id = $request->post('job_id');

        $job = Listing::query()->find($id);

        if ($job->exists()) {
            JobSave::create([
                'user_id' => Auth::id(),
                'job_id' => $id,
                'job_type' => $job->job_type,
                'job_region' => $job->job_region,
                'title' => $job->title,
                'feature_image' => $job->feature_image,
                'slug' => $job->slug
            ]);

            return  back()->with('success', 'your job was saved');
        }

        return  back()->with('error', 'your job already saved');
    }
}
