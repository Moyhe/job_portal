<x-layout>

    <div class="container mb-5 mt-3">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <img src="{{Storage::url($listing->feature_image)}}" class="card-img-top" alt="Cover Image" style="height: 250px; object-fit: cover;">
                    <div class="card-body">

                        <b>{{$listing->profile->name}}</b>
                        <h2 class="card-title">{{$listing->title}}</h2>

                         <x-flash />

                        <span class="badge bg-primary">{{$listing->job_type}}</span>
                        <p>Salary: ${{number_format((float)$listing->salary,2)}}</p>
                        Address: {{$listing->address}}

                        <h4 class="mt-4">Description</h4>
                        <p class="card-text lead">{!!$listing->description!!}</p>

                        <h4>Roles and Responsibilities</h4>
                        {!!$listing->roles!!}

                        <p class="card-text mt-4">Application closing date: {{$listing->application_close_date}}</p>
                        @if(Auth::check())
                        @if(auth()->user()->resume)
                        <form action="{{route('applicantion.submit',[$listing->id])}}" method="POST">
                            @csrf
                            <button href="#" class="btn btn-dark btn-lg mt-3">Apply Now</button>
                        </form>
                        @else

                        <button type="button" class="btn btn-dark btn-lg " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Apply
                        </button>

                        </form>
                        @endif
                        @else
                        <p>Please login to apply</p>
                        @endif

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <form action="{{route('applicantion.submit',[$listing->id])}}" method="POST">
                                @csrf
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Upload resume</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="file" />
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" id="btnApply" disabled class="btn btn-success btn-lg">Apply</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
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
