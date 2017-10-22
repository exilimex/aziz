<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/blog.css" rel="stylesheet">
</head>

<body>

@include('layouts.nav')

<main role="main" class="container">

    <div class="row">

        @yield('content')
        <!-- /.blog-main -->

        @include('layouts.sidebar')
        <!-- /.blog-sidebar -->

    </div><!-- /.row -->

</main><!-- /.container -->

@include('layouts.footer')



</body>
</html>
