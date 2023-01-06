<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<style>
    footer {
            height: 50px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            bottom: 0;
        }
</style>
<body>
    @guest
        @else
            <div class="bg-light">
                <div class="container">
                    <nav class="navbar navbar-expand-lg bg-light row" style="height: 50px;">
                        <div class="container-fluid">
                            <a class="navbar-brand text-primary" href="/courses">Learn</a>
                            <div class="navbar-nav">
                                <a class="nav-link" href="/courses">Dashboard</a>
                                @guest
                                    @else
                                        @if(auth()->user()->isTeacher)
                                        @else
                                        <a class="nav-link" href="/list-course">Course List</a>
                                        @endif
                                @endguest 
                                
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle profile" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; border: none;">
                                        <img src="/User.svg" alt="" style="border-radius: 100rem; height: 30px;">
                                    </button>
                                    <ul class="dropdown-menu ">
                                        <li class="dropdown-item d-flex justify-content-center">
                                            <a href="/profile" class="text-black" style="margin: 0;  border-bottom: 1px solid black; padding-left: 3rem; padding-right: 3rem; padding-bottom: 0.5rem; text-decoration: none;">Profile</a>
                                        </li>
                                        <li class="dropdown-item  d-flex justify-content-center">
                                            <form action="/logout" method="POST">
                                                @csrf
                                                <button class="text-black" type="submit" style="border: none; padding-left: 3rem; padding-right: 3rem; padding-bottom: 0.5rem; background-color: transparent;">Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
    @endguest 
    <div class="content">
        @yield('content')
    </div> 
    <footer class="bg-primary">
        <div>Copyright©WebprogLECKelompokLupa</div>
    </footer>
</body>
</html>