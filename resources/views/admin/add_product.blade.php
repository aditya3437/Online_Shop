<!DOCTYPE html>
<html>

<head>
  @include('admin.css')
  <style type="text/css">
    .div-deg{
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 60px ;
    }
    h1{
      color: white;
    }
    label
    {
      display: inline-block;
      width: 250px;
      font-size: 18px !important;
      color: white !important;
    }
    .input-deg{
      padding: 20px;
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
          <h1>Add Product</h1>
      <div class="div-deg">
        <form action="{{url('upload_product')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="input-deg">
            <label for="">Product Title</label>
            <input type="text" name="title" required>
          </div>
          <div class="input-deg">
            <label for="">Description</label>
            <textarea name="description" required></textarea>
          </div>
          <div class="input-deg">
            <label for="">Price</label>
            <input type="text" name="price">
          </div>
          <div class="input-deg">
            <label for="">Quantity</label>
            <input type="text" name="quantity">
          </div>
          <div class="input-deg">
            <label for="">Product category</label>
            <select name="category" required>
              <option>Select a Option</option>
              @foreach($data as $data)
              <option value="">{{$data->category_name}}</option>
             @endforeach
            </select>
          </div>
          <div class="input-deg">
            <label for="">Product Image</label>
            <input type="file" name="image">
          </div>
          <div class="input-deg">
            
            <input class="btn btn-success" type="submit" value="Add Product">
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