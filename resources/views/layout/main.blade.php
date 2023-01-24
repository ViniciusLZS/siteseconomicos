<!doctype html>
<html lang="en">
@include('layout.head')

<body>
  @include('layout.customTemplate')
  <div class="wrapper">
    @include('layout.header', ['page' => $page])
    @include('layout.siderbar')
    
    <div class="main-panel">
      <div class="content">
        @yield('content')
      </div>

    </div>
    @include('layout.footer')
    
  </div>

</body>
</html>