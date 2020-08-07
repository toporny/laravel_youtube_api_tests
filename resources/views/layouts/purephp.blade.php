<!DOCTYPE html>
<html lang="en">
<head>
   @include('includes.head')
</head>
<body>

  <div class="container-fluid">
    <div id="main">
           @yield('content')
    </div>
    
    @include('includes.footer')
    
  </div>

</body>
</html>


 