<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <x-flash />
                <div class="card shadow-lg">
                    <div class="card-header">Login</div>
                    <form action="{{route('login.post')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control">

                               @error('email')
                               <span class="text-danger">{{ $message}}</span>
                               @enderror

                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control">

                               @error('password')
                               <span class="text-danger">{{ $message }}</span>
                               @enderror

                            </div>
                            <br>
                            <div class="form-group text-center">
                                <button class="btn btn-dark" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
