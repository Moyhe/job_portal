<?php

namespace App\Http\Controllers;

use App\Models\JobSave;
use App\Models\Listing;
use App\Models\Search;
use App\Models\User;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class JoblistingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, User $user)
    {
        $listings = Listing::query();

        $jobs = $listings->with('profile')->paginate(5);

        $count = $listings->count();

        $company = $listings
            ->selectRaw('company')
            ->count();

        $jobsApplied = $listings->latest()
            ->withCount('users')
            ->get();

        $keywords = Search::query()
            ->select('keyword', DB::raw('COUNT(*) as `count`'))
            ->groupBy('keyword')
            ->havingRaw('count > 1')
            ->orderBy('count', 'asc')
            ->limit(3)
            ->get();


        $filterdJobs = $user->query()
            ->join('listing_user', function (JoinClause $join) {
                $join->on('users.id', '=', 'listing_user.user_id')
                    ->where('listing_user.shortlisted',  1);
            })
            ->count();


        return view('home', compact('jobs', 'count', 'keywords', 'company', 'jobsApplied', 'filterdJobs'));
    }

    public function show(Listing $listing)
    {
        $count = JobSave::query()
            ->where('user_id', Auth::user()?->id)
            ->where('job_id', $listing->id)
            ->count();

        $jobRelated = $listing->query()
            ->where('id', '!=', $listing->id)
            ->inRandomOrder()
            ->take(5)
            ->get();

        return view('show', compact('listing', 'count', 'jobRelated'));
    }

    public function company($id)
    {
        $company =  User::with('jobs')->where('id', $id)->where('user_type', 'employer')->first();

        return view('company', compact('company'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'region' => 'required',
            'job_type' => 'required'
        ]);

        Search::create([
            'keyword' => $request->title
        ]);

        $searches = Listing::query()->filter(request(['title', 'region', 'job_type']))->get();

        return view('seeker.search', compact('searches'));
    }
}
