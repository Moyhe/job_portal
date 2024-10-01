<x-layout>
    <!-- HOME -->
    <x-banner :$header />


    <section class="py-5 bg-image overlay-primary fixed overlay" id="next"
        style="background-image: url('{{ asset('image/hero_1.jpg') }}');">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2 text-white">JobBoard Site Stats</h2>
                    <p class="lead text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita unde
                        officiis recusandae sequi excepturi corrupti.</p>
                </div>
            </div>
            <div class="row pb-0 block__19738 section-counter">

                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        @forelse ($jobsApplied->skip($count - 1) as $job)
                            <strong class="number" data-number="{{ $job->users_count }}">0</strong>
                        @empty
                            <strong class="number" data-number="0">0</strong>
                        @endforelse
                    </div>
                    <span class="caption">Candidates</span>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="{{ $count }}">0</strong>
                    </div>
                    <span class="caption">Jobs Posted</span>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="{{ $filterdJobs }}">0</strong>
                    </div>
                    <span class="caption">Jobs Filled</span>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="{{ $company }}">0</strong>
                    </div>
                    <span class="caption">Companies</span>
                </div>


            </div>
        </div>
    </section>



    <section class="site-section pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <a data-fancybox data-ratio="2" href="https://vimeo.com/317571768" class="block__96788">
                        <span class="play-icon"><span class="icon-play"></span></span>
                        <img src="{{ asset('image/sq_img_6.jpg') }}" alt="Image" class="img-fluid img-shadow">
                    </a>
                </div>
                <div class="col-lg-5 ml-auto">
                    <h2 class="section-title mb-3">JobBoard For Freelancers, Web Developers</h2>
                    <p class="lead">Eveniet voluptatibus voluptates suscipit minima, cum voluptatum ut dolor, sed
                        facere
                        corporis qui, ea quisquam quis odit minus nulla vitae. Sit, voluptatem.</p>
                    <p>Ipsum harum assumenda in eum vel eveniet numquam, cumque vero vitae enim cupiditate deserunt
                        eligendi
                        officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio
                        nostrum
                        sit!</p>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0 order-md-2">
                    <a data-fancybox data-ratio="2" href="https://vimeo.com/317571768" class="block__96788">
                        <span class="play-icon"><span class="icon-play"></span></span>
                        <img src="{{ asset('image/sq_img_6.jpg') }}" alt="Image" class="img-fluid img-shadow">
                    </a>
                </div>
                <div class="col-lg-5 mr-auto order-md-1  mb-5 mb-lg-0">
                    <h2 class="section-title mb-3">JobBoard For Workers</h2>
                    <p class="lead">Eveniet voluptatibus voluptates suscipit minima, cum voluptatum ut dolor, sed
                        facere
                        corporis qui, ea quisquam quis odit minus nulla vitae. Sit, voluptatem.</p>
                    <p>Ipsum harum assumenda in eum vel eveniet numquam, cumque vero vitae enim cupiditate deserunt
                        eligendi
                        officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio
                        nostrum
                        sit!</p>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade">
                    <h2 class="section-title mb-3">Our Team</h2>
                </div>
            </div>

            <div class="row align-items-center block__69944">

                <div class="col-md-6">
                    <img src="{{ asset('image/sq_img_5.jpg') }}" alt="Image" class="img-fluid img-shadow">
                </div>

                <div class="col-md-6">
                    <h3>Elisabeth Smith</h3>
                    <p class="text-muted">Creative Director</p>
                    <p>Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores
                        repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae
                        voluptatibus ut? Ex vel ad explicabo iure ipsa possimus consectetur neque rem molestiae eligendi
                        velit?.</p>
                    <div class="social mt-4">
                        <a href="#"><span class="icon-facebook"></span></a>
                        <a href="#"><span class="icon-twitter"></span></a>
                        <a href="#"><span class="icon-instagram"></span></a>
                        <a href="#"><span class="icon-linkedin"></span></a>
                    </div>
                </div>

                <div class="col-md-6 order-md-2 ml-md-auto">
                    <img src="{{ asset('image/person_5.jpg') }}" alt="Image" class="img-fluid img-shadow">

                </div>

                <div class="col-md-6">
                    <h3>Chintan Patel</h3>
                    <p class="text-muted">Creative Director</p>
                    <p>Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores
                        repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae
                        voluptatibus ut? Ex vel ad explicabo iure ipsa possimus consectetur neque rem molestiae eligendi
                        velit?.</p>
                    <div class="social mt-4">
                        <a href="#"><span class="icon-facebook"></span></a>
                        <a href="#"><span class="icon-twitter"></span></a>
                        <a href="#"><span class="icon-instagram"></span></a>
                        <a href="#"><span class="icon-linkedin"></span></a>
                    </div>
                </div>
            </div>
    </section>


</x-layout>
