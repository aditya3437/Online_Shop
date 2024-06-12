<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .center-content {
      text-align: center;
    }
    .center-content img {
      margin-top: 20px;
    }
  </style>
</head>
<body>
  <div class="center-content">
    <h3>Customer Name: {{ $data->name }}</h3>
    <h3>Customer Address: {{ $data->rec_address }}</h3>
    <h3>Phone: {{ $data->phone }}</h3>
    <h2>Title: {{ $data->product->title }}</h2>
    <h2>Price: {{ $data->product->price }}</h2>
    <img height="240" src="/products/{{ $data->product->image }}" alt="Product Image">
  </div>
</body>
</html>
