<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __invoke(User $user)
    {
        $listings = Listing::query();

        $jobs = $listings->with('profile')->get();

        $count = $listings->count();

        $company = $listings
            ->selectRaw('company')
            ->count();

        $jobsApplied = $listings->latest()
            ->withCount('users')
            ->get();


        $filterdJobs = $user->query()
            ->join('listing_user', function (JoinClause $join) {
                $join->on('users.id', '=', 'listing_user.user_id')
                    ->where('listing_user.shortlisted',  1);
            })
            ->count();


        $header = 'About';

        return view('about', compact('jobs', 'count', 'company', 'jobsApplied', 'filterdJobs', 'header'));
    }
}
