<x-admin.main>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <x-flash />
            <h2 >Update your profile</h2>
            <form action="{{route('admin.update.profile')}}" method="post" enctype="multipart/form-data" class="mt-3">
                @csrf
                <div class="col-md-8">
                    <div class="form-group mb-3">
                        <label for="name">Profile image</label>
                        <input type="file" class="form-control" id="name" name="profile_pic">
                        @if(auth()->user()->profile_pic)
                        <img src="{{Storage::url(auth()->user()->profile_pic)}}" width="150" class="mt-3">
                        @endif
                    </div>
                    <div class="form-group mb-3">
                        <label for="name">Your name</label>
                        <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}">
                    </div>
                    <div class="form-group mt-4">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="row justify-content-center mt-5">
            <h2>Change your password</h2>

            <form action="{{route('admin.password')}}" method="post">
                @csrf
                <div class="col-md-8">
                    <div class="form-group mb-3">
                        <label for="current_password">Your current password</label>
                        <input type="password" name="current_password" class="form-control" id="current_password">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password">Your new password</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password_confirmation">Confirm password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                    </div>
                    <div class="form-group mt-4 mb-3">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin.main>
