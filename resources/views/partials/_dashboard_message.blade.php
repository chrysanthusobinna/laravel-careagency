        @if(session('success'))
            <div class="alert alert-light-success light alert-dismissible fade show txt-success border-left-success mb-5" role="alert">
                <i data-feather="check-square"></i>
                <p>{{ session('success') }}</p>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
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