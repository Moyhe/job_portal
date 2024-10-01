<x-layout>

    <!-- HOME -->

    <x-banner :$header />

    <section class="site-section">
        <div class="container">
            <x-flash />
            <ul class="job-listings mb-5">
                @forelse ($jobSaved as $job)
                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="{{ route('job.show', $job->slug) }}"></a>
                        <div class="job-listing-logo">
                            <img src="{{ $job->getThumbnail() }}" alt="Free Website Template by Free-Template.co"
                                class="img-fluid">
                        </div>

                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                <h2>{{ $job->title }}</h2>
                                <strong>{{ $job->company }}</strong>
                            </div>
                            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                <span class="icon-room"></span> {{ $job->job_region }}
                            </div>
                            <div class="job-listing-meta">
                                <span class="badge badge-danger">{{ $job->job_type }}</span>
                            </div>
                        </div>

                    </li>
                @empty
                    <div class="alert alert-danger mb-0">
                        your job save is empty
                    </div>
                @endforelse
            </ul>
            {{ $jobSaved->onEachSide(5)->links() }}
        </div>
    </section>



</x-layout>
