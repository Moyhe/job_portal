<x-layout>

    @php
        $job = auth()
            ->user()
            ?->listings()
            ->where('listing_id', $listing->id);
    @endphp

    <!-- HOME -->
    <x-banner :$listing />

    <section class="site-section">
        <div class="container">
            <x-flash />
            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="border p-2 d-inline-block mr-3 job-listing-logo rounded">
                            <img style="width: 288px; height: 288px;" src="{{ $listing->getThumbnail() }}" alt="Image">
                        </div>
                        <div>
                            <h2>{{ $listing->title }}</h2>
                            <div>
                                <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span>Puma</span>
                                <span class="m-2"><span
                                        class="icon-room mr-2"></span>{{ $listing->job_region }}</span>
                                <span class="m-2"><span class="icon-clock-o mr-2"></span><span
                                        class="text-primary">{{ $listing->job_type }}</span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-5">
                            {{-- <figure class="mb-5"><img src="{{ asset('image/job_single_img_1.jpg') }}" alt="Image" class="img-fluid rounded"></figure> --}}
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                    class="icon-align-left mr-3"></span>Job Description</h3>
                            <p>
                                {{ $listing->description }}
                            </p>
                        </div>
                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                    class="icon-rocket mr-3"></span>Responsibilities</h3>
                            <p>
                                {{ $listing->roles }}
                            </p>
                        </div>

                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                    class="icon-book mr-3"></span>Education + Experience</h3>
                            <p>
                                {{ $listing->education_experience }}
                            </p>
                        </div>

                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                    class="icon-turned_in mr-3"></span>Other Benifits</h3>
                            <p>
                                {{ $listing->other_benifits }}
                            </p>
                        </div>

                        <div class="row mb-5">

                            @if (Auth::check())
                                <div class="col-6">
                                    {{-- <button class="btn btn-block btn-light btn-md"><i class="icon-heart"></i>Save Job</button> --}}
                                    <form action="{{ route('save.job') }}" method="POST">
                                        @csrf
                                        <input name="job_id" type="hidden" value="{{ $listing->id }}">

                                        @if ($count > 0)
                                            <button type="submit" class="btn btn-block btn-light btn-md"
                                                @disabled(true)><i class="icon-heart"></i>you saved this
                                                job</button>
                                        @else
                                            <button type="submit" class="btn btn-block btn-light btn-md"><i
                                                    class="icon-heart"></i>Save Job</button>
                                        @endif
                                    </form>
                                </div>

                                <div class="col-6">
                                    @if ($job->exists())
                                        <form action="{{ route('applicantion.submit', [$listing->id]) }}"
                                            method="POST">
                                            @csrf
                                            <button @disabled(true) href="#"
                                                class="btn btn-block btn-primary btn-md">
                                                submitted
                                            </button>
                                        </form>
                                    @else
                                        <button type="button" id="myBtn" class="btn btn-block btn-primary btn-md">
                                            Apply Now
                                        </button>
                                    @endif
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-block btn-primary btn-md">Please login to
                                    apply</a>
                            @endif

                            <!-- The Modal -->
                            <div id="myModal" class="modal">
                                <form action="{{ route('applicantion.submit', [$listing->id]) }}" method="POST">
                                    @csrf
                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Upload resume</h1>
                                            <span class="close">&times;</span>
                                        </div>
                                        <div class="modal-body mt-3">
                                            <input type="file" />
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnApply" disabled
                                                class="btn btn-success btn-lg mt-3 mb-2">Apply</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="bg-light p-3 border rounded mb-4">
                            <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Job Summary</h3>
                            <ul class="list-unstyled pl-3 mb-0">
                                <li class="mb-2"><strong class="text-black">Published on:</strong>
                                    {{ $listing->created_at->format('Y-d-m') }}</li>
                                <li class="mb-2"><strong class="text-black">Vacancy:</strong>
                                    {{ $listing->vacancy }} </li>
                                <li class="mb-2"><strong class="text-black">Employment Status:</strong>
                                    {{ $listing->job_type }} </li>
                                <li class="mb-2"><strong class="text-black">Experience:</strong>
                                    {{ $listing->experience }}</li>
                                <li class="mb-2"><strong class="text-black">Job Location:</strong>
                                    {{ $listing->job_region }} </li>
                                <li class="mb-2"><strong class="text-black">Salary:</strong> {{ $listing->salary }}
                                </li>
                                <li class="mb-2"><strong class="text-black">Gender:</strong> {{ $listing->gender }}
                                </li>
                                <li class="mb-2"><strong class="text-black">Application
                                        Deadline:</strong>{{ $listing->application_close_date }}</li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
    </section>



    <section class="site-section" id="next">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">{{ count($jobRelated) }} Related Jobs</h2>
                </div>
            </div>

            <ul class="job-listings mb-5">

                @foreach ($jobRelated as $job)
                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="{{ route('job.show', $job->slug) }}"></a>
                        <div class="job-listing-logo">
                            <img src="{{ $job->getThumbnail() }}" alt="Image" class="img-fluid">
                        </div>

                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                <h2>{{ $job->title }}</h2>
                                <strong>Adidas</strong>
                            </div>
                            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                <span class="icon-room"></span> {{ $job->job_region }}
                            </div>
                            <div class="job-listing-meta">
                                <span class="badge badge-danger">{{ $job->job_type }}</span>
                            </div>
                        </div>

                    </li>
                @endforeach

            </ul>
        </div>
    </section>

    <script>
        const inputElement = document.querySelector('input[type="file"]');
        const pond = FilePond.create(inputElement);
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        pond.setOptions({
            server: {
                url: '/resume/upload',
                process: {
                    method: 'POST',
                    withCredentials: false,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    ondata: (formData) => {
                        formData.append('file', pond.getFiles()[0].file, pond.getFiles()[0].file.name)

                        return formData
                    },
                    onload: (response) => {
                        document.getElementById('btnApply').removeAttribute('disabled')
                    },
                    onerror: (response) => {
                        console.log('error while uploading....', response)
                    },

                },
            },
        });
    </script>

</x-layout>
