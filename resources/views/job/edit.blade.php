<x-admin.main>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-5">
            <h1>Update a job</h1>
            <x-flash />

            <form action="{{route('job.update',[$listing->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

            <div class="form-group">
                    <label for="title">Feature Image</label>
                    <input type="file" name="feature_image" id="feature_image" class="form-control">
                      @error('feature_image')
                           <div class="error"> {{ $message }}  </div>
                      @enderror
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{$listing->title}}">
                    @error('title')
                    <div class="error"> {{ $message }}  </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control summernote">{{$listing->description}}</textarea>
                    @error('description')
                    <div class="error"> {{ $message }}  </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Roles and Responsibility</label>
                    <textarea id="description" name="roles" class="form-control summernote">{{$listing->roles}}</textarea>
                    @error('roles')
                    <div class="error"> {{ $message }}  </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Job types</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="job_type" id="Fulltime" value="Fulltime"
                         {{ $listing->job_type === 'Fulltime' ? 'checked' : '' }}>
                        <label for="Fulltime" class="form-check-label">Fulltime</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="job_type" id="Parttime" value="Parttime"
                        {{ $listing->job_type === 'Parttime' ? 'checked' : '' }}>
                        <label for="Parttime" class="form-check-label">Parttime</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="job_type" id="casual" value="Casual"
                        {{ $listing->job_type === 'Casual' ? 'checked' : '' }}>
                        <label for="casual" class="form-check-label">Casual</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" name="job_type" id="Contract" value="Contract"
                        {{ $listing->job_type === 'Contract' ? 'checked' : '' }}>
                        <label for="Contract" class="form-check-label">Contract</label>
                    </div>
                    @error('job_type')
                    <div class="error"> {{ $message }} </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{$listing->address}}">
                    @error('address')
                        <div class="error"> {{ $message }}  </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="address">Salary</label>
                    <input type="text" name="salary" id="salary" class="form-control" value="{{$listing->salary}}">
                    @error('salary')
                            <div class="error"> {{ $message }}  </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="date">Application closing date</label>
                    <input type="text" name="date" id="datepicker" class="form-control" value="{{$listing->application_close_date}}">
                    @error('date')
                    <div class="error"> {{ $message }}  </div>
                    @enderror
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-success">Update a job</button>
                </div>

            </form>
        </div>
    </div>
</div>
</x-admin.main>
