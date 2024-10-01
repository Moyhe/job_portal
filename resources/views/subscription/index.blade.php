<x-layout>

            <!-- HOME -->
            <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('image/hero_1.jpg') }}');" id="home-section">
                <div class="container">
                    <div class="row">
                      <div class="col-md-7">
                        <h1 class="text-white font-weight-bold">Subscriptions</h1>
                        <div class="custom-breadcrumbs">
                          <a href="#">Home</a> <span class="mx-2 slash">/</span>
                          <span class="text-white"><strong>Subscriptions</strong></span>
                        </div>
                      </div>
                    </div>
                  </div>
              </section>

    <div class="container mt-5">
        <div class="row justify-content-center">
             <x-flash />
                <div class="col-md-4">
                  <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Weekly - $20</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, esse!</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body text-center">
                        <a href="{{route('pay.weekly')}}" class="card-link">
                            <button class="btn btn-success">Pay</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Monthly - $80</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, esse!</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body text-center">
                        <a href="{{route('pay.monthly')}}" class="card-link">
                            <button class="btn btn-success">Pay</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Yearly - $200</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, esse!</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="card-body text-center">
                        <a href="{{route('pay.yearly')}}" class="card-link">
                            <button class="btn btn-success">Pay</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
