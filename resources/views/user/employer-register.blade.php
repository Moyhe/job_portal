<x-layout>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Looking for an employee?</h1>
                <h3>Please create an account</h3>
                <img src="{{asset('image/register.png')}}">
            </div>
            <div class="col-md-6">
                <div class="card" id="card">
                          <div class="card-header">Employer Registration</div>
                    <form action="{{route('store.employer')}}" method="post" id="registrationForm">
                        @csrf
                            <div class="card-body">
                            <div class="form-group">
                                <label for="">Company name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" >

                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control" >

                             @error('email')
                             <span class="text-danger">{{ $message }}</span>
                             @enderror

                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" >

                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <br>
                            <div class="form-group">
                                <button class="btn btn-dark" id="btnRegister" type="submit"> Register</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="message" class="mt-3"></div>
            </div>
        </div>
    </div>

</x-layout>

