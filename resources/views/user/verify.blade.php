<x-layout>
    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('image/hero_1.jpg') }}');" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
            <h1 class="text-white font-weight-bold">verify your email</h1>
            <div class="custom-breadcrumbs">
                <a href="#">Home</a> <span class="mx-2 slash">/</span>
                <span class="text-white"><strong>verify your email</strong></span>
            </div>
            </div>
        </div>
        </div>
    </section>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="card">
            <div class="card-header">Verify Account</div>
            <div class="card-body">
            <p>Your account is not verified. Please verify your account. You may resend
                the verification email.

                <a href="{{route('resend.email')}}">Resend veification email</a>

            </p>
            </div>
        </div>
        @if(Session::has('success'))
        <div class="card">
            <div class="card-body">
                <div class="alert alert-success">{{Session::get('success')}}</div>
            </div>
        </div>
        @endif
    </div>
</div>

</x-layout>
