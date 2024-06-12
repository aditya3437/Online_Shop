<!DOCTYPE html>
<html>

<head>
  <style type="text/css">
    table{
      border: 2px solid skyblue;
      text-align: center;
    }
    th{
      background-color: skyblue;
      padding: 10px;
      font-size: 18px;
      font-weight: bold;
      text-align: center;
    }
    .table-centre{
      display: flex;
      justify-content: center;
      align-items: center;
    }
    td {
    color: white;
    padding: 9px;
    border: 1px solid skyblue;
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
          <div class="table-centre">
       <table>
        <tr>
          <th>Customer name</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Product title</th>
          <th>price</th>
          <th>Image</th>
          <th>Status</th>
          <th>Change Status</th>
          <th>Print PDF</th>
        </tr>
        @foreach($data as $data)
        <tr>
          <td>{{$data->name}}</td>
          <td>{{$data->rec_address}}</td>
          <td>{{$data->phone}}</td>
          <td>{{$data->product->title}}</td>
          <td>{{$data->product->price}}</td>
          <td>
            <img width="150" src="products/{{$data->product->image}}" alt="">
            
          </td>
          <td>
            @if($data->status == 'in progress')
            <span style="color:red">{{$data->status}}</span>
            @elseif($data->status == 'on the way')
            <span style="color:skyblue">{{$data->status}}</span>
            @else
            <span style="color:yellow">{{$data->status}}</span>
            @endif
          </td>
          <td>
            <a class="btn btn-danger" href="{{url('on_the_way',$data->id)}}">on the way</a>
            <a class="btn btn-success" href="{{url('delivered',$data->id)}}">Delivered</a>
          </td>
          <td>
            <a class="btn btn-secondary" href="{{url('print_pdf',$data->id)}}">Print PDF</a>
          </td>
        </tr>
        @endforeach
       </table>
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