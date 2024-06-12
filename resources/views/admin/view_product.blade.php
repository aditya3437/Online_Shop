<!DOCTYPE html>
<html>

<head>
  <style type="text/css">
    .div-deg {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 60px;
      flex-direction: column; 
    }
    .table-deg {
      border: 2px solid greenyellow;
    }
    th {
      background-color: skyblue;
      color: white;
      font-size: 19px;
      font-weight: bold;
      padding: 15px;
    }
    td {
      border: 1px solid skyblue;
      text-align: center;
      color: white;
    }
    .pagination-links {
      margin-top: 20px;
    }
    .pagination-links ul {
      display: flex;
      list-style: none;
      padding: 0;
    }
    .pagination-links li {
      margin: 0 5px;
    }
    .pagination-links a {
      padding: 8px 12px;
      text-decoration: none;
      color: skyblue;
      border: 1px solid skyblue;
      border-radius: 5px;
    }
    .pagination-links .active a {
      background-color: skyblue;
      color: white;
    }
    input[type='search']{
      width: 350px;
      height: 45px;
      margin-left: 50px;
      border-radius: 5px;
    }

  </style>
  @include('admin.css')
</head>

<body>
  @include('admin.header')

  <!-- Sidebar Navigation-->
  @include('admin.siderbar')
  <!-- Sidebar Navigation end-->
  <div class="page-content">
    <div class="page-header">
      <div class="container-fluid">
        <form action="{{url('product_search')}}">
          <input type="search" name="search" >
          <input type="submit"  class="btn btn-secondary" value="Search">
        </form>
        <div class="div-deg">

          <table class="table-deg">
            <tr>
              <th>Product Title</th>
              <th>Description</th>
              <th>Category</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Image</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
            @foreach($product as $products)
            <tr>
              <td>{{$products->title }}</td>
              <td>{{!!Str::limit($products->description,50)!!}}</td>
              <td>{{$products->category }}</td>
              <td>{{ $products->price }}</td>
              <td>{{ $products->quantity }}</td>
              <td>
                <img height="150" width="150" src="products/{{ $products->image }}" alt="">
              </td>
              <td>
                <a class="btn btn-success" href="{{url('edit_product',$products->id)}}" >Edit</a>
              </td>
              <td>
                <a class="btn btn-danger onclick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Delete</a>
              </td>
            </tr>
            @endforeach
          </table>
          <div class="pagination-links">
          {{ $product->links() }}
          </div>
        </div>
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
