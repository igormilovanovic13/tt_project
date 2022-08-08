<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <title>Report Export</title>
        <style>
            body {
                margin: 0 auto;
                max-width: 1000px;
                min-width: 800px;
            }

            .nav-heading {
                padding: 0.7rem;
                font-family: sans-serif;
                font-size: 1.3rem;
            }
            .pdng {
                padding: 0.7rem;
            }

            .navbar {
                border-bottom: 1px solid lightgray;
            }

            .table-font{
                font-weight: normal;
            }
        </style>

    </head>
    <body class="antialiased">
    <nav class="navbar navbar-light bg-white">
        <a class="navbar-brand nav-heading" href="#">Reports</a>
    </nav>
    <h3 class="pdng">List of reports</h3>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Report name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr >
            <th scope="row" class="table-font">Report 1 - Excel</th>
            <td><a href="/export/excel" class="btn btn-primary">Download</a></td>
        </tr>
        <tr>
            <th scope="row" class="table-font">Report 2 - XML</th>
            <td><a href="/export/xml" class="btn btn-primary">Download</a></td>
        </tr>
        </tbody>
    </table>
    @if (session()->has('Error'))
        <div class="alert alert-warning" role="alert">
            <strong>
                {{ session('Error') }}
            </strong>
        </div>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>
