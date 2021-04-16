<x-layouts.merchant>

    <div class="titleMain">
        <h1>KYC</h1>
        <p>Step 2: Know your Business</p>
    </div>

    <div class="content card">
        <div class="card-body">
            @if ( Session::has('success') )
                <div class="alert alert-success" role="alert">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg> <strong>Sucess!</strong> Registration created successfully!
                </div>
            @endif

            <form class="formLogin row" action="{{ route('kyc.store.step1') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="col-md-12 d-flex flex-row-reverse">
                    <button type="submit" class="btn-next mt-3">Next</button>
                </div>
                <div class="col-md-12">
                    <ul class="nav nav-wizard">
                        <li><a class="nav-link">
                            <span>1</span>
                        </a></li>
                        <li><a class="nav-link active">
                            <span>2</span>
                        </a></li>
                        <li><a class="nav-link">
                            <span>3</span>
                        </a></li>
                        <li><a class="nav-link">
                            <span>4</span>
                        </a></li>
                    </ul>
                </div>
            </form>

        </div>

    </div>
</x-layouts.merchant>
