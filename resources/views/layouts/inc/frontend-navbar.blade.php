
<div class="global-navbar">
    <div class="container">
        <div class="row">

            {{-- logo --}}
            <div class="col-md-3">
                <img src="{{ asset('assets/images/logo.svg')}}" class="w-100" alt="Logo" />
            </div>

            {{-- Advertise section --}}
            <div class="col-md-9 my-auto">
                <div class="border p-2 text-center">
                    <h5>Advertise here</h5>
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-green">
                <div class="container">
                
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                    <a class="nav-link"  href="{{ url('/')}}">Home</a>
                                    </li>                                 
                                  
                                    {{-- Commented for future use --}}
                                    {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Dropdown
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                    </li> --}}

                                    {{-- Fetch categories - Hidden --}}
                                    @php
                                        $categories = App\Models\Category::where([
                                            'navbar_status' => 0 ,
                                           'status' => 0 
                                            ])->get();
                                    @endphp

                                    @foreach($categories as $category)
                                        
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{ url('tutorial/'.$category->slug)}}">{{$category->name }}</a>
                                    </li>                                    
                                    @endforeach
                                   
                            </ul>

                        </div>
                </div>
            </nav>
</div>