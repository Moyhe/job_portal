<x-admin.main>

 <!-- HOME -->
 <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('image/hero_1.jpg') }}');" id="home-section">
    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1 class="text-white font-weight-bold">Post A Job</h1>
          <div class="custom-breadcrumbs">
            <a href="#">Home</a> <span class="mx-2 slash">/</span>
            <a href="#">Job</a> <span class="mx-2 slash">/</span>
            <span class="text-white"><strong>Post a Job</strong></span>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="site-section">
    <div class="container">
      <div class="row align-items-center mb-5">
        <div class="col-lg-8 mb-4 mb-lg-0">
          <div class="d-flex align-items-center">
            <div>
              <h2>Post A Job</h2>
            </div>
          </div>
        </div>

      </div>
      <div class="row mb-5">
        <div class="col-lg-12">
          <form action="{{route('job.store')}}" method="POST" enctype="multipart/form-data" class="p-4 p-md-5 border rounded" >
               @csrf
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
              <input type="text" name="title" class="form-control" id="job-title" placeholder="Product Designer">
              @error('title')
              <div class="error"> {{ $message }}  </div>
              @enderror
            </div>


            <div class="form-group">
              <label for="job-region">Job Region</label>
              <select name="job_region" class="selectpicker border rounded" id="job-region" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Region">
                    <option value="cairo">cairo</option>
                    <option value="San Francisco">San Francisco</option>
                    <option value="Palo Alto">Palo Alto</option>
                    <option value="New York">New York</option>
                    <option value="Manhattan">Manhattan</option>
                    <option value="Ontario">Ontario</option>
                    <option value="Toronto">Toronto</option>
                    <option value="Kansas">Kansas</option>
                    <option value="Mountain View">Mountain View</option>
                  </select>
                  @error('job_region')
                  <div class="error"> {{ $message }}  </div>
                  @enderror
            </div>

            <div class="form-group">
              <label for="job-type">Job Type</label>
              <select name="job_type" class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Job Type">
                <option value="Part Time">Part Time</option>
                <option value="Full Time">Full Time</option>
              </select>
              @error('job_type')
              <div class="error"> {{ $message }}  </div>
              @enderror
            </div>

            <div class="form-group">
              <label for="job-location">Vacancy</label>
              <input name="vacancy" type="text" class="form-control" id="job-location" placeholder="e.g. 3">
              @error('vacancy')
              <div class="error"> {{ $message }}  </div>
              @enderror
            </div>

            <div class="form-group">
                <label for="job-location">Company</label>
                <input name="company" type="text" class="form-control" id="job-location" placeholder="company">
                @error('company')
                <div class="error"> {{ $message }}  </div>
                @enderror
            </div>


            <div class="form-group">
              <label for="job-type">Experience</label>
              <select name="experience" class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Years of Experience">
                <option value="1-3 years">1-3 years</option>
                <option value="3-6 years">3-6 years</option>
                <option value="6-9 years">6-9 years</option>
              </select>
              @error('experience')
              <div class="error"> {{ $message }}  </div>
              @enderror
            </div>
            <div class="form-group">
              <label for="job-type">Salary</label>
              <select name="salary" class="selectpicker border rounded" id="job-type" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Salary">
                <option value="$50k - $70k">$50k - $70k</option>
                <option value="$70k - $100k">$70k - $100k</option>
                <option value="$100k - $150k">$100k - $150k</option>
              </select>
              @error('salary')
              <div class="error"> {{ $message }}  </div>
              @enderror
            </div>

            <div class="form-group">
              <label for="job-type">Gender</label>
              <select name="gender" class="selectpicker border rounded" id="" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Any">Any</option>
              </select>
              @error('gender')
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

            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="">Job Description</label>
                <textarea name="description" id="" cols="30" rows="7" class="form-control" placeholder="Write Job Description..."></textarea>
              </div>
              @error('description')
              <div class="error"> {{ $message }}  </div>
              @enderror
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="">Responsibilities</label>
                <textarea name="roles" id="" cols="30" rows="7" class="form-control" placeholder="Write Responsibilities..."></textarea>
              </div>
              @error('roles')
              <div class="error"> {{ $message }}  </div>
              @enderror
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="">Education & Experience</label>
                <textarea name="education_experience" id="" cols="30" rows="7" class="form-control" placeholder="Write Education & Experience..."></textarea>
              </div>
              @error('education_experience')
              <div class="error"> {{ $message }}  </div>
              @enderror
            </div>

            <div class="row form-group">
              <div class="col-md-12">
                <label class="text-black" for="">Other Benifits</label>
                <textarea name="other_benifits" id="" cols="30" rows="7" class="form-control" placeholder="Write Other Benifits..."></textarea>
              </div>
              @error('other_benifits')
              <div class="error"> {{ $message }}  </div>
              @enderror
            </div>

            <div class="col-lg-4 ml-auto">
                <div class="row">
                  <div class="col-6">
                    <input type="submit" name="submit" class="btn btn-block btn-primary btn-md" style="margin-left: 200px;" value="Save Job">
                  </div>
                </div>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>

</x-admin.main>
