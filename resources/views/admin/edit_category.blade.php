<!DOCTYPE html>
<html>

<head>
  @include('admin.css')
  <style type="text/css">
  input[type='text'] {
    width: 400px;
    height: 50px;
  }

  .div-deg {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 30px;
  }
</style>
</head>

<body>
@include('admin.header')
  
    <!-- Sidebar Navigation-->
   @include('admin.siderbar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
      <div class="page-header">
        <div class="container-fluid">
        <h1 style="color: white;">Updated Category</h1>
        <div class="div-deg">

          <form action="{{url('update_category',$data->id)}}" method="post">
            @csrf
            <div>
              <input type="text" name="category" value="{{$data->category_name}}" aria-label="Category name">
              <input class="btn btn-success" type="submit" value="Updated Category" aria-label="Updated Category">
            </div>
          </form>
        </div>
    </div>
  </div>
  <!-- JavaScript files-->
  <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
  <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
  <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('js/charts-home.js') }}"></script>
  <script src="{{ asset('js/front.js') }}"></script>

</body>

</html>