<x-layout>

    <!-- HOME -->
    <x-banner :$header />

    <section class="site-section" id="next-section">
        <div class="container">
            <div class="error-message mt-2 text-success" role="alert" id="successMessage"></div>
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <form action="#" id="contactForm">
                        <div class="row form-group">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <label class="text-black" for="fname">First Name</label>
                                <input type="text" id="fname" class="form-control">
                                <span class="error-message mt-2 text-danger" id="fname-error"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="text-black" for="lname">Last Name</label>
                                <input type="text" id="lname" class="form-control">
                                <span class="error-message mt-2 text-danger" id="lname-error"></span>
                            </div>
                        </div>

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="email">Email</label>
                                <input type="email" id="email" class="form-control">
                                <span class="error-message mt-2 text-danger" id="email-error"></span>
                            </div>
                        </div>

                        <div class="row form-group">

                            <div class="col-md-12">
                                <label class="text-black" for="subject">Subject</label>
                                <input type="subject" id="subject" class="form-control">
                                <span class="error-message mt-2 text-danger" id="subject-error"></span>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-12">
                                <label class="text-black" for="message">Message</label>
                                <textarea name="message" id="message" cols="30" rows="7" class="form-control"
                                    placeholder="Write your notes or questions here..."></textarea>
                                <span class="error-message mt-2 text-danger" id="message-error"></span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <input type="submit" value="Send Message" class="btn btn-primary btn-md text-white">
                            </div>
                        </div>


                    </form>
                </div>
                <div class="col-lg-5 ml-auto">
                    <div class="p-4 mb-3 bg-white">
                        <p class="mb-0 font-weight-bold">Address</p>
                        <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>

                        <p class="mb-0 font-weight-bold">Phone</p>
                        <p class="mb-4"><a href="#">+1 232 3235 324</a></p>

                        <p class="mb-0 font-weight-bold">Email Address</p>
                        <p class="mb-0"><a href="#">youremail@domain.com</a></p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section bg-light">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade">
                    <h2 class="section-title mb-3">Happy Candidates Says</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="block__87154 bg-white rounded">
                        <blockquote>
                            <p>&ldquo;Ipsum harum assumenda in eum vel eveniet numquam cumque vero vitae enim cupiditate
                                deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex
                                asperiores quisquam optio nostrum sit&rdquo;</p>
                        </blockquote>
                        <div class="block__91147 d-flex align-items-center">
                            <figure class="mr-4"><img src="{{ asset('image/person_2.jpg') }}" alt="Image"
                                    class="img-fluid">
                            </figure>
                            <div>
                                <h3>Chris Peter</h3>
                                <span class="position">Creative Director</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="block__87154 bg-white rounded">
                        <blockquote>
                            <p>&ldquo;Ipsum harum assumenda in eum vel eveniet numquam, cumque vero vitae enim
                                cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum
                                hic ex asperiores quisquam optio nostrum sit&rdquo;</p>
                        </blockquote>
                        <div class="block__91147 d-flex align-items-center">
                            <figure class="mr-4"><img src="{{ asset('image/person_2.jpg') }}" alt="Image"
                                    class="img-fluid">
                            </figure>
                            <div>
                                <h3>Chris Peter</h3>
                                <span class="position">Web Designer</span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>



    <script>
        document.querySelector('#contactForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData();

            let errors = {};
            let successMessage = '';


            const success = document.querySelector('#successMessage');
            const errorElements = document.querySelectorAll('.error-message');

            formData.append('fname', document.querySelector('#fname').value);
            formData.append('lname', document.querySelector('#lname').value);
            formData.append('email', document.querySelector('#email').value);
            formData.append('subject', document.querySelector('#subject').value);
            formData.append('message', document.querySelector('#message').value);


            axios.post('/submit', formData)
                .then(response => {
                    if (response.status == 200) {
                        removeError(errorElements);
                        successMessage = response.data.message;
                    }
                    document.querySelector('#successMessage').textContent = successMessage;
                    removeSucessMessage();
                })
                .catch(error => {
                    if (error.response.status == 422) {
                        errors = error.response.data.errors;
                    } else {
                        errors.general = 'An error occurred. Please try again.';
                    }
                    displayError(errors);
                });


            function removeSucessMessage() {
                setTimeout(() => {
                    if (success) {
                        success.textContent = '';
                    }
                }, 6000);
            }

            function removeError(errorElements) {
                errorElements.forEach((err) => {
                    err.textContent = '';
                });
            }

            function displayError(errors) {
                Object.keys(errors).forEach(function(key) {
                    const errorElement = document.querySelector(`#${key}-error`);
                    if (errorElement) {
                        errorElement.textContent = errors[key][0];
                    }
                });
            }

        });
    </script>

</x-layout>
