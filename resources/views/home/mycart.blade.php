<!DOCTYPE html>
<html>

<head>
  <style type="text/css">
    .div_deg {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 60px;
    }

    table {
      border: 2px solid black;
      text-align: center;
      width: 800px;
    }

    th {
      border: 2px solid black;
      text-align: center;
      color: white;
      font: 20px;
      font-weight: bold;
      background-color: black;
    }

    td {
      border: 1px solid skyblue;
    }

    .cart-value {
      text-align: center;
      margin-bottom: 70px;
      padding: 18px;
    }

    .order_deg {
      padding-right: 100px;
      margin-top: -30px;
    }

    label {
      display: inline-block;
      width: 150px;
    }

    .div_gap {
      padding: 20px;
    }
  </style>
  @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    <div class="div_deg">
      <div class="order_deg">
        <form action="{{ url('confirm_order') }}" method="post">
          @csrf
          <div class="div_gap">
            <label for="">Receiver Name</label>
            <input type="text" name="name" value="{{ Auth::user()->name }}">
          </div>
          <div class="div_gap">
            <label for="">Receiver Address</label>
            <textarea name="address">{{ Auth::user()->address }}</textarea>
          </div>
          <div class="div_gap">
            <label for="">Receiver Phone</label>
            <input type="text" name="phone" value="{{ Auth::user()->phone }}">
          </div>
          <div class="div_gap">
            <input class="btn btn-primary" type="submit" name="name" value="Cash On Delivery">
            <a class="btn btn-success" href="{{url('stripe',$value)}}">Pay Using Card</a>
          </div>
        </form>
      </div>
      <table>
        <tr>
          <th>Product Title</th>
          <th>Price</th>
          <th>Image</th>
        </tr>
        <?php $value = 0; ?>
        @foreach ($cart as $cart)
        <tr>
          <td>{{ $cart->product->title }}</td>
          <td>{{ $cart->product->price }}</td>
          <td>
            <img width="120" src="/products/{{ $cart->product->image }}" alt="">
          </td>
        </tr>
        <?php $value += $cart->product->price; ?>
        @endforeach
      </table>
    </div>
    <div class="cart-value">
      <h3>Total Value of Cart is : ${{ $value }}</h3>
    </div>
    @include('home.footer')
  </div>
</body>

</html>
