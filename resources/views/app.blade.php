<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layout.header')

<body id="page-top">
    <div id="app">
        <div id="body">
            <!-- Page Wrapper -->
            <div id="wrapper">

                <router-view class="view nav" name="Nav"></router-view>

                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">

                    <router-view name="Topbar"></router-view>

                    <div id='content' class="container">
                        <router-view></router-view>
                    </div>
                </div>
                <!-- End of Content Wrapper -->
            </div> <!-- End of Wrapper -->
        </div>
    </div>
</body>

@include('layout.footer')
</html>
