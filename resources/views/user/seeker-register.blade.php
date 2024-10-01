<x-layout>

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('image/hero_1.jpg') }}');" id="home-section">
        <div class="container">
          <div class="row">
            <div class="col-md-7">
              <h1 class="text-white font-weight-bold">Register</h1>
              <div class="custom-breadcrumbs">
                <a href="#">Home</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>Register</strong></span>
              </div>
            </div>
          </div>
        </div>
      </section>



      <section class="site-section">
        <div class="container">
          <div class="row">
            <div class="col-md-12 mb-5">
              <form action="{{route('store.seeker')}}" method="post" id="registrationForm" class="p-4 border rounded">
                  @csrf
                <div class="row form-group">
                  <div class="col-md-12 mb-3 mb-md-0">
                    <label class="text-black" for="name">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" >

                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12 mb-3 mb-md-0">
                    <label class="text-black" for="email">Email</label>
                        <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control" >

                             @error('email')
                             <span class="text-danger">{{ $message }}</span>
                             @enderror
                  </div>
                </div>
                <div class="row form-group">
                  <div class="col-md-12 mb-3 mb-md-0">
                    <label class="text-black" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" >

                    @error('password')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror

                  </div>
                </div>
                <div class="row form-group mb-4">
                  <div class="col-md-12 mb-3 mb-md-0">
                    <label class="text-black" for="c_password">Re-Type Password</label>
                    <input type="password" name="password_confirmation" id="c_password" class="form-control" >
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-12">
                    <input type="submit" value="Sign Up" class="btn px-4 btn-primary text-white">
                  </div>
                </div>

              </form>
            </div>

          </div>
        </div>
      </section>
</x-layout>
