<!DOCTYPE html>
<html>

<head>
  <style type="">
    .div_center{
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .detail-box{
      padding: 15px;
    }
  </style>
  @include('home.css');
</head>

<body>
  <div class="hero_area">
    <!-- header section starts -->
    @include('home.header')
    <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
        
        <div class="col-md-12">
          <div class="box">
            
              <div class="img-box div_center">
                <img width="400" src="/products/{{$product->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>{{$product->title}}</h6>
                <h6>Price
                  <span>
                  {{$product->price}}
                  </span>
                </h6>
              </div >

              <div class="detail-box">
                <h6>Category:{{$product->category}}</h6>
                <h6>Available Quantity:
                  <span>
                  {{$product->quantity}}
                  </span>
                </h6>
              </div >

              <div class="detail-box">
                
                <p>{{$product->description}}</p>
              </div >
              
          
        </div>

      </div>
    </div>
  </section>
  <!-- end shop section -->
  @include('home.footer')