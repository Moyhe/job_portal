<x-layout>
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