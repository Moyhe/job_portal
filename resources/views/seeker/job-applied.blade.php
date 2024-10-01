<x-layout>

    <!-- HOME -->
    <x-banner :$header />

    <section class="site-section">
        <div class="container">
            <x-flash />
            <ul class="job-listings mb-5">


                @foreach ($users as $user)
                    @forelse ($user->listings as $listing)
                        <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                            <a href="{{ route('job.show', $listing->slug) }}"></a>
                            <div class="job-listing-logo">
                                <img src="{{ $listing->getThumbnail() }}" alt="Free Website Template by Free-Template.co"
                                    class="img-fluid">
                            </div>

                            <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                                <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                    <h2>{{ $listing->title }}</h2>
                                    <strong>{{ $listing->company }}</strong>
                                </div>
                                <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                    <span class="icon-room"></span> {{ $listing->job_region }}
                                </div>
                                <div class="job-listing-meta">
                                    <span class="badge badge-danger">{{ $listing->job_type }}</span>
                                </div>
                            </div>
                            {{ $users->onEachSide(3)->links() }}
                        </li>

                    @empty
                        <div class="alert alert-danger mb-0">
                            your job applications is empty
                        </div>
                    @endforelse
                @endforeach

            </ul>

        </div>
    </section>

</x-layout>
