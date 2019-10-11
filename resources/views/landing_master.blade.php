<!DOCTYPE html>
<html>
    <!-- head -->
    @include('main.layouts.head')
    <!-- /.head -->
    <body>
        <!--<body class="hold-transition skin-blue sidebar-mini">-->
        <!-- Site wrapper -->
       

            <!-- header -->
            @include('main.layouts.header')
            <!-- /.header -->

           

            <!-- Content Wrapper. Contains page content -->
            @yield('main_content')
            <!-- /.content-wrapper -->

            <!-- Footer. contains the footer -->
            @include('main.layouts.footer')
            <!-- /.Footer -->

           
       

       
    </body>
</html>
