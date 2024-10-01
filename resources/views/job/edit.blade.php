<x-admin.main>

 <!-- HOME -->
 <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('image/hero_1.jpg') }}');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">Update A Job</h1>
          <div class="custom-breadcrumbs">
            <a href="#">Home</a> <span class="mx-2 slash">/</span>
            <a href="#">Job</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Update A Job</strong></span>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="site-section">
    <div class="container">
        <x-flash />
      <div class="row align-items-center mb-5">
        <div class="col-lg-8 mb-4 mb-lg-0">
          <div class="d-flex align-items-center">
            <div>
              <h2>Update A Job</h2>
            </div>
          </div>
        </div>

      </div>
      <div class="row mb-5">
        <div class="col-lg-12">
          <form action="{{route('job.update',[$listing->id])}}" method="POST" enctype="multipart/form-data" class="p-4 p-md-5 border rounded" >
            @csrf
            @method('PUT')
            <!--job details-->

            <div class="form-group mb-3">
                <label for="title">Feature Image</label>
                <input type="file" name="feature_image" id="feature_image" class="form-control">

                   @error('feature_image')
                   <div class="error"> {{ $message }}  </div>
                   @enderror

            </div>

            <div class="form-group">
              <label for="title">Job Title</label>
              <input type="text" name="title" class="form-control" id="job-title" value="{{ $listing->title }}" placeholder="Product Designer">
              @error('title')
              <div class="error"> {{ $message }}  </div>
              @enderror
            </div>


            <div class="form-group">
              <label for="job-region">Job Region</label>
              <select name="job_region" class="selectpicker border rounded" id="job-region" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Region">
                    <option value="cairo"  {{ $listing->job_region == 'cairo' ? 'selected' : '' }}>cairo</option>
                    <option {{ $listing->job_region == 'San Francisco' ? 'selected' : '' }} value="San Francisco">San Francisco</option>
                    <option {{ $listing->job_region == 'Palo Alto' ? 'selected' : '' }} value="Palo Alto">Palo Alto</option>
                    <option {{ $listing->job_region == 'New York' ? 'selected' : '' }} value="New York">New York</option>
                  </select>
                  @error('job_region')
                  <div class="error"> {{ $message }}  </div>
                  @enderror
            </div>

            <div class="form-group">
              <label for="job-type">Job Type</label>
              <select name="job_type" class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type">
                <option {{ $listing->job_type == 'Part Time' ? 'selected' : '' }} value="Part Time">Part Time</option>
                <option {{ $listing->job_type == 'Full Time' ? 'selected' : '' }} value="Full Time">Full Time</option>
              </select>
              @error('job_type')
              <div class="error"> {{ $message }}  </div>
              @enderror
            </div>

            <div class="form-group">
              <label for="job-location">Vacancy</label>
              <input name="vacancy" type="text" value="{{ $listing->vacancy }}" class="form-control" id="job-location" placeholder="e.g. 3">
              @error('vacancy')
              <div class="error"> {{ $message }}  </div>
              @enderror
            </div>

            <div class="form-group">
                <label for="job-location">Company</label>
                <input name="company" type="text" class="form-control" value="{{ $listing->company }}" id="job-location" placeholder="company">
                @error('company')
                <div class="error"> {{ $message }}  </div>
                @enderror
              </div>

            <div class="form-group">
              <label for="job-type">Experience</label>
              <select name="experience" class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Years of Experience">
                <option {{ $listing->experience == '1-3 years' ? 'selected' : '' }} value="1-3 years">1-3 years</option>
                <option {{ $listing->experience == '3-6 years' ? 'selected' : '' }} value="3-6 years">3-6 years</option>
                <option {{ $listing->experience == '6-9 years' ? 'selected' : '' }} value="6-9 years">6-9 years</option>
              </select>
              @error('experience')
              <div class="error"> {{ $message }}  </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="job-type">Salary</label>
              <select name="salary" class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Salary">
                <option {{ $listing->salary == '$50k - $70k' ? 'selected' : '' }} value="$50k - $70k">$50k - $70k</option>
                <option {{ $listing->salary == '$70k - $100k' ? 'selected' : '' }} value="$70k - $100k">$70k - $100k</option>
                <option {{ $listing->salary == '$100k - $150k' ? 'selected' : '' }} value="$100k - $150k">$100k - $150k</option>
              </select>
              @error('salary')
              <div class="error"> {{ $message }}  </div>
              @enderror
            </div>

            <div class="form-group">
              <label for="job-type">Gender</label>
              <select name="gender" class="selectpicker border rounded" id="" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Gender">
                <option {{ $listing->gender == 'Male' ? 'selected' : '' }} value="Male">Male</option>
                <option {{ $listing->gender == 'Female' ? 'selected' : '' }} value="Female">Female</option>
                <option {{ $listing->gender == 'Any' ? 'selected' : '' }} value="Any">Any</option>
              </select>
              @error('gender')
              <div class="error"> {{ $message }}  </div>
              @enderror

            </div>

            <div class="form-group mb-3">
                <label for="date">Application closing date</label>
                <input type="text" name="date" id="datepicker" value="{{ $listing->application_close_date }}" class="form-control">

                   @error('date')
                   <div class="error"> {{ $message }}  </div>
                   @enderror

            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="">Job Description</label>
                <textarea name="description" id="" cols="30" rows="7" class="form-control" placeholder="Write Job Description...">
                    {{ $listing->description }}
                </textarea>
              </div>
              @error('description')
              <div class="error"> {{ $message }}  </div>
              @enderror
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="">Responsibilities</label>
                <textarea name="roles" id="" cols="30" rows="7" class="form-control" placeholder="Write Responsibilities...">
                    {{ $listing->roles }}
                </textarea>
              </div>
              @error('roles')
              <div class="error"> {{ $message }}  </div>
              @enderror
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="">Education & Experience</label>
                <textarea name="education_experience" id="" cols="30" rows="7" class="form-control" placeholder="Write Education & Experience...">
                    {{ $listing->education_experience }}
                </textarea>
              </div>
              @error('education_experience')
              <div class="error"> {{ $message }}  </div>
              @enderror
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="">Other Benifits</label>
                <textarea name="other_benifits" id="" cols="30" rows="7" class="form-control" placeholder="Write Other Benifits...">
                    {{ $listing->other_benifits }}
                </textarea>
              </div>
              @error('other_benifits')
              <div class="error"> {{ $message }}  </div>
              @enderror
            </div>

            <div class="col-lg-4 ml-auto">
                <div class="row">
                  <div class="col-6">
                    <input type="submit" name="submit" class="btn btn-block btn-primary btn-md" style="margin-left: 200px;" value="Update Job">
                  </div>
                </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>
</x-admin.main>
