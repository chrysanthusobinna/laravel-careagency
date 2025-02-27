@if(session('success'))
    <div class="alert alert-light-success light alert-dismissible fade show txt-success border-left-success mb-5 d-flex align-items-center" role="alert">
        <i class="fa fa-check-circle me-3 text-success"></i>
        <span class="text-success">{{ session('success') }}</span>
        <button class="btn-close ms-auto" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-light-danger light alert-dismissible fade show txt-danger border-left-danger mb-5 d-flex align-items-center" role="alert">
        <i class="fa fa-exclamation-triangle me-3 text-danger"></i>
        <span class="text-danger">{{ session('error') }}</span>
        <button class="btn-close ms-auto" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-light-danger light alert-dismissible fade show txt-danger border-left-danger mb-5" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>  
@endif
