<x-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h1>Looking for a job?</h1>
                <h3>Please create an account</h3>
                <img src="{{ asset('image/it-engineer-working-with-his-pc.jpeg') }}" width="580"
                class="img-responsibe">
            </div>

            <div class="col-md-6 mt-5 mb-5">
                <div class="card" id="card" style="margin-top:50px;">
                    <div class="card-header">Register</div>
                    <form action="{{ route('store.seeker') }}" method="post" id="registrationForm">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Full name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>

                               @error('name')
                               <span class="text-danger">{{ $message }}</span>
                               @enderror

                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control" required>

                               @error('email')
                               <span class="text-danger">{{ $message }}</span>
                               @enderror

                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control" required>

                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                            </div>
                            <br>
                            <div class="form-group mb-5 mt-3">
                                <button class="btn btn-dark" type="submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="message" class="mt-2"></div>
            </div>
        </div>
    </div>
</x-layout>
