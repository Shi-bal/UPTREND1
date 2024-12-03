<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    @include('admin.css')

    <style>
      .div_center {
        text-align: center;
        padding-top: 40px;
      }
      .font_size {
        font-size: 40px;
        padding-bottom: 40px;
      }
      .text_color {
        color: black;
        padding-bottom: 20px;
      }
      label {
        display: inline-block;
        width: 200px;
      }
      .div_design {
        padding-bottom: 15px;
      }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      @include('admin.sidebar')
      @include('admin.header')

      <div class="main-panel">
        <div class="content-wrapper">
          @if(session()->has('message'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              {{ session()->get('message') }}
            </div>
          @endif

          @if($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <div class="div_center">
            <h1 class="font_size">ADD PRODUCT</h1>
            <form action="{{ url('/add_product') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="div_design">
                <label>Product Title:</label>
                <input type="text" class="text_color" name="title" placeholder="Write a title" required>
              </div>

              <div class="div_design">
                <label>Product Description:</label>
                <input type="text" class="text_color" name="description" placeholder="Write a description" required>
              </div>

              <div class="div_design">
                <label>Product Price:</label>
                <input type="number" class="text_color" name="price" placeholder="Write product price" required>
              </div>

              <div class="div_design">
                <label>Product Quantity:</label>
                <input type="number" min="0" class="text_color" name="quantity" placeholder="Write product quantity" required>
              </div>

              <div class="div_design">
                <label>Discount Price:</label>
                <input type="number" class="text_color" name="discount_price" placeholder="Discount price">
              </div>

              <div class="div_design">
                <label>Product Category:</label>
                <select class="text_color" name="category" required>
                  <option value="" selected>Add a category here</option>
                  @foreach($category as $cat)
                    <option value="{{ $cat->category_name }}">{{ $cat->category_name }}</option>
                  @endforeach
                </select>
              </div>

            

              <div class="div_design">
                <label>Product Image 1:</label>
                <input type="file" name="image1" required>
              </div>

              <div class="div_design">
                <label>Product Image 2:</label>
                <input type="file" name="image2" required>
              </div>

              <div class="div_design">
                <label>Product Image 3:</label>
                <input type="file" name="image3" required>
              </div>

              

              <div class="div_design">
                <input type="submit" value="Add Product" class="btn btn-primary">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    @include('admin.script')
  </body>
</html>
