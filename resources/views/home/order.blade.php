<!DOCTYPE html>
<html>

<head>
  <style type="text/css">
    .div-centre{
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 60px;
    }
    table{
      border: 2px solid skyblue;
      text-align: center;
      width: 800px;
    }
    th{
      border: 2px solid skyblue;
      background-color: black;
      color: white;
      font-size: 19px;
      font-weight: bold;
      text-align: center;
    }
    td{
      border: 1px solid skyblue;
      padding: 10px;
    }
  </style>
  @include('home.css');
</head>

<body>
  <div class="hero_area">
    @include('home.header')
    <div  class="div-centre">
      <table>
        <tr>
          <th>Product Name</th>
          <th>Price</th>
          <th>Delivery Status</th>
          <th>Image</th>
        </tr>
        @foreach($order as $order)
        <tr>
          <td>{{$order->product->title}}</td>
          <td>{{$order->product->price}}</</td>
          <td>{{$order->status}}</</td>
          <td>
            <img width="100" height="100" src="products/{{$order->product->image}}" alt="">
            </</td>
        </tr>
        @endforeach
      </table>
    </div>
   
  @include('home.footer')