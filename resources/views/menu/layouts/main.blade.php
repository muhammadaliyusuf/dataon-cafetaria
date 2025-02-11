{{-- hasil copy dari file template pada 'examples' bootstrap 'dashboard' --}}
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Muhammad Ali Yusuf">
        <title>DataOn Cafetaria</title>

        <!-- cdn Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

        <!-- Custom styles for this template -->
        <link href="/css/dashboard.css" rel="stylesheet">

        <style>
            body {
                background-color: #f8f9fa;
            }

            .transition-all {
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }
            .transition-all:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            }
            .btn-hover {
                transition: background-color 0.3s ease, transform 0.3s ease;
            }
            .btn-hover:hover {
                background-color: #0b5ed7;
                transform: scale(1.05);
            }
            .card-img-top {
                border-radius: 10px 10px 0 0;
            }
            .card {
                border-radius: 10px;
            }
            .modal-content {
                border-radius: 15px;
                border: none;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            }

            .modal-header {
                border-top-left-radius: 15px;
                border-top-right-radius: 15px;
            }

            .modal-footer {
                border-bottom-left-radius: 15px;
                border-bottom-right-radius: 15px;
            }

            .form-control-lg, .form-select-lg {
                font-size: 1rem;
                padding: 0.75rem 1rem;
            }

            .btn-lg {
                padding: 0.4rem 1.25rem;
                font-size: 1rem;
            }

            .btn-outline-secondary:hover {
                background-color: #f8f9fa;
            }
        </style>
    </head>
    <body>
    
        @include('menu.layouts.header')

        <div class="container-fluid">
            <div class="row">
                @include('menu.layouts.sidebar')

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    
                    @yield('container')
                </main>
            </div>
        </div>

        {{-- js cdn bootstrap yg 'bundle' --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <!-- DataTables JS -->
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <!-- DataTables Bootstrap 5 JS -->
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

        

        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
        <script src="/js/dashboard.js"></script>
    </body>
</html>
