<x-layouts.merchant>

    <div class="titleMain">
        <h1>Step 3: Business Description</h1>
    </div>

    <div class="card shadow mb-5">
        <div class="card-body">

            <div class="row">
                <div class="col-md-6">
                    <p>All fields marked with <span class="text-danger">*</span> are mandatory</p>
                </div>
                <div class="col-md-6 d-flex flex-row-reverse">
                    <button wire:click.prevent="store('draft')" class="btn-outline-primary mt-3">Save as Draft</button>
                    <button wire:click.prevent="store('next')" class="btn-outline-primary mt-3">Next</button>
                </div>

                <div class="col-md-12">
                    <ul class="nav nav-wizard">
                        <li><a class="nav-link" href="#!">
                            <span>1</span>
                        </a></li>
                        <li><a class="nav-link" href="#!">
                            <span>2</span>
                        </a></li>
                        <li><a class="nav-link active" href="#!">
                            <span>3</span>
                        </a></li>
                        <li><a class="nav-link" href="#!">
                            <span>4</span>
                        </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-layouts.merchant>

