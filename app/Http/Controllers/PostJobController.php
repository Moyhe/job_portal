<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminRoute;
use App\Http\Middleware\isEmployer;
use App\Http\Middleware\isPremiumUser;
use App\Http\Requests\JobEditFormRequest;
use App\Http\Requests\JobPostFormRequest;
use App\Models\Listing;
use App\Post\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostJobController extends Controller
{

    protected $job;
    public function __construct(JobPost $job)
    {
        $this->job = $job;
        $this->middleware(AdminRoute::class);
        $this->middleware(isPremiumUser::class)->only(['create', 'store']);
        $this->middleware(isEmployer::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Listing::where('user_id', auth()->user()->id)->get();

        return view('job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobPostFormRequest $request)
    {
        $this->job->store();
        return redirect()->route('job.index')->with('success', 'Your job post has been posted');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return view('job.edit', compact('listing'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobEditFormRequest $request, string $id)
    {


        $this->job->updateJob($id, $request);

        return back()->with('success', 'Your job post has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();

        return back()->with('success', 'Your job post has been successfully deleted');
    }
}
