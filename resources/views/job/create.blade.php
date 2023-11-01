<x-admin.main>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">

                <h1>Post a job</h1>
                <form action="{{route('job.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title">Feature Image</label>
                        <input type="file" name="feature_image" id="feature_image" class="form-control">

                           @error('feature_image')
                           <div class="error"> {{ $message }}  </div>
                           @enderror

                    </div>
                    <div class="form-group mb-3">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">

                           @error('title')
                           <div class="error"> {{ $message }}  </div>
                           @enderror

                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description</label>
                        <textarea id="description" name="description"  class="form-control summernote">
                            {{ old('description') }}
                        </textarea>

                           @error('description')
                           <div class="error"> {{ $message }}  </div>
                           @enderror

                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Roles and Responsibility</label>
                        <textarea id="description" name="roles" rows="8" cols="8" class="form-control summernote">
                            {{ old('description') }}
                        </textarea>

                            @error('roles')
                            <div class="error"> {{ $message }}  </div>
                            @enderror

                    </div>
                    <div class="form-group mb-3">
                        <label>Job types</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="job_type" id="Fulltime" value="Fulltime">
                            <label for="Fulltime" class="form-check-label">Fulltime</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="job_type" id="Parttime" value="Parttime">
                            <label for="Parttime" class="form-check-label">Parttime</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="job_type" id="casual" value="Casual">
                            <label for="casual" class="form-check-label">Casual</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="job_type" id="Contract" value="Contract">
                            <label for="Contract" class="form-check-label">Contract</label>
                        </div>

                          @error('job_type')
                          <div class="error"> {{ $message }} </div>
                          @enderror

                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" value="{{ old('address') }}" class="form-control">

                        @error('address')
                        <div class="error"> {{ $message }}  </div>
                        @enderror

                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Salary</label>
                        <input type="text" name="salary" id="salary" value="{{ old('salary') }}" class="form-control">

                            @error('salary')
                            <div class="error"> {{ $message }}  </div>
                            @enderror

                    </div>
                    <div class="form-group mb-3">
                        <label for="date">Application closing date</label>
                        <input type="text" name="date" id="datepicker" value="{{ old('date') }}" class="form-control">

                           @error('date')
                           <div class="error"> {{ $message }}  </div>
                           @enderror

                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-success">Post a job</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

</x-admin.main>
