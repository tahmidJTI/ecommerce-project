<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer/style.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

{{--    image zoom section--}}
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{asset('dist/css/demo.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/css/yBox.css')}}" />
    <link rel="stylesheet" href="{{asset('dist/css/yBox.min.css')}}" />


    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=1"
    />
    <title>jQuery yBox: Advanced Modal Popup Plugin Examples</title>
    <link
        href="https://www.jqueryscript.net/css/jquerysctipttop.css"
        rel="stylesheet"
        type="text/css"
    />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500&display=swap"
        rel="stylesheet"
    />
    <script
        type="text/javascript"
        src="https://code.jquery.com/jquery-3.5.1.min.js"
    ></script>
    <style>
        button {
            outline: none;
        }
    </style>


</head>


<body>

{{--nav section--}}
<div class="navbar-section">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">TF-STORE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto nav-item-margin">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                        <a class="dropdown-item" href="{{ route('categories.index', $category->name) }}">{{ $category->name }}</a>
                            <div class="dropdown-divider"></div>
                        @endforeach
                    </div>
                  </li>



                @if(!auth()->user())
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link">{{auth()->user()->name}}</a>
                    </li>

                    @if(auth()->user()->admin == "admin")
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin.index')}}">Admin-Panel</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cart.index')}}">Cart {{$cart === 0 ? '' : '('.$cart.')'}}</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Settings
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('security.index') }}">Change Password</a>
                                <div class="dropdown-divider"></div>
                        </div>
                      </li>
                @endif
            </ul>



            <form class="form-inline my-2 my-lg-0" action="{{ route('search.store') }}" method="post">
                {{ csrf_field() }}
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>

            @if(auth()->user())
                <div class="logout">
                    <form action="/logout" method="post" class="form-inline my-2 my-lg-0">
                        {{csrf_field()}}
                        <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
                    </form>
                </div>
            @endif

        </div>
    </nav>
</div>

{{--slider section--}}

    <div class="slider-section">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php $id = 0 ?>
                @foreach($sliders as $slider)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$id++}}"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach($sliders as $slider)
                <div class="carousel-item @if($slider->active_status == 'active') active @endif">
                    <img class="d-block w-100" src="{{asset('storage/'.$slider->slider_image)}}" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h6>{{$slider->title}}</h6>
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

{{--available product section--}}

    <div class="main-content-section">
        <h5 class="available-products">Available Products</h5>
        <div class="main-content">
            <div class="row">

                @foreach($products as $product)

                <div class="col-md-3 col-sm-12 columns">
                    <div class="card cards-padding">
                        <div class="group-wrap">
                            <a
                                href="{{asset('storage/'.$product->product_image)}}"
                                class="yBox img-fluid"
                                data-ybox-group=""
                                {{-- style="width: 300px; height: 300px" --}}
                            >
                                <img class="card-img-top main-img-width" src="{{asset('storage/'.$product->product_image)}}" alt="Card image cap">

                            </a>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{$product->product_name}}</h5>
                            <p class="card-text">{{$product->product_price}}/-</p>
                            <a href="{{route('products.show',$product->id)}}" class="btn btn-info btn-width-cap show-info-button">Show Info</a>
                            <a href="{{route('cart.add',$product->id)}}" class="btn btn-primary btn-width-cap">Add to cart</a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    <div class="pp" style="display: flex; justify-content: center">
        {{ $products->links() }}
    </div>



<div>
    <x-footer></x-footer>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="{{asset('dist/js/directive.js')}}"></script>
<script src="{{asset('dist/js/directive.min.js')}}"></script>
<script src="{{asset('dist/js/yBox.js')}}"></script>
<script src="{{asset('dist/js/yBox.min.js')}}"></script>

</body>
</html>
