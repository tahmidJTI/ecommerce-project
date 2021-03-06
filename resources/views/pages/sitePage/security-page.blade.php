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

            <ul class="navbar-nav ml-auto nav-item-margin">
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
                @endif
            </ul>



            <form class="form-inline my-2 my-lg-0" action="{{ route('search.store') }}" method="post">
                {{ csrf_field() }}
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
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


{{-- Password section --}}
<section>
    <div>
        @if (session('password_success'))
            <p style="background-color : #90EE90; padding: 10px">{{ session('password_success') }} </p>
        @elseif(session('password_faild'))
        <p style="background-color : #FF5733; padding: 10px">{{ session('password_faild') }}</p>
        @endif
    </div>
    <div>
       <h3>Change Password</h3>
        <hr>
        <form action="{{ route ('security.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Enter current password :</label>
                <input type="text" class="form-control" placeholder="" name="current_password" required>
            </div>

            <div class="form-group">
                <label for="">Enter new password :</label>
                <input type="text" class="form-control" placeholder="" name="new_password" required>
            </div>

            <div class="form-group">
                <label for="">Type again new password :</label>
                <input type="text" class="form-control" placeholder="" name="verify_password" required>
            </div>

            <div class="form-group">
                <input type="submit" value="Confirm" class="btn btn-info">
            </div>
        </form>
    </div>
</section>


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
