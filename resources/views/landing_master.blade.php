<!DOCTYPE html>
<html>
    <!-- head -->
    @include('layouts.main.shared.head')
    <!-- /.head -->
    <body>
        <!--<body class="hold-transition skin-blue sidebar-mini">-->
        <!-- Site wrapper -->
       

            <!-- header -->
            @include('layouts.main.shared.header')
            <!-- /.header -->

           

            <!-- Content Wrapper. Contains page content -->
            @yield('main_content')
            <!-- /.content-wrapper -->

            <!-- Footer. contains the footer -->
            @include('layouts.main.shared.footer')
            <!-- /.Footer -->

           
       

       
    </body>
</html>
