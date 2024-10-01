<x-layout>

     <!-- HOME -->
     <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('image/hero_1.jpg') }}');" id="home-section">
        <div class="container">
            <div class="row">
              <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Search</h1>
                <div class="custom-breadcrumbs">
                  <a href="#">Home</a> <span class="mx-2 slash">/</span>
                  <span class="text-white"><strong>search</strong></span>
                </div>
              </div>
            </div>
          </div>
      </section>


    <section class="site-section">
        <div class="container">
          <ul class="job-listings mb-5">

             @forelse ($searches as $search )
             <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                <a href="job-single.html"></a>
                <div class="job-listing-logo">
                  <img src="{{Storage::url($search->feature_image)}}" alt="Free Website Template by Free-Template.co" class="img-fluid">
                </div>

                <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                  <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                    <h2>{{ $search->title }}</h2>
                  </div>
                  <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                    <span class="icon-room"></span> {{ $search->job_region }}
                  </div>
                  <div class="job-listing-meta">
                    <span class="badge badge-danger">{{ $search->job_type }}</span>
                  </div>
                </div>

              </li>
             @empty
             <div class="alert alert-danger mb-0">
                No jobs Posted Yet in this category
             </div>
             @endforelse


        </ul>
        </div>
      </section>

</x-layout>
