<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    @include('admin.css')

    <style type="text/css">

        .center{
            margin: auto;
            width: 50%;
            border: 2px solid skyblue;
            text-align: center;
            margin-top: 40px;
        }

        .img_size{
            width: 100px;
            height: 100px;
        }

        .th_color{
            background: skyblue;

        }

        .th_deg{
            padding: 30px;
        }

    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')

      <div class="main-panel">
        <div class="content-wrapper">


        <table class="center">
            <tr class="th_color">
                <th class="th_deg">Product Title</th>
                <th class="th_deg">Description</th>
                <th class="th_deg">Quantity</th>
                <th class="th_deg">Category</th>
                <th class="th_deg">Price</th>
                <th class="th_deg">Discount Price</th>
                <th class="th_deg">Image 1</th>
                <th class="th_deg">Image 2</th>
                <th class="th_deg">Image 3</th>

                

            </tr>

            @foreach($product as $product)

            <tr>
                <td>{{$product->title}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->discount_price}}</td>
                <td>
                    <img class="img_size" src="/product/{{$product->image1}}">
                </td>
                <td>
                    <img class="img_size" src="/product/{{$product->image2}}">

                </td>
                <td>
                    <img class="img_size" src="/product/{{$product->image3}}">

                </td>

            </tr>

            @endforeach
        </table>

        </div>
      </div>
     
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')

  </body>
</html>