<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width initial-scale=1.0">
  <title>Admincast bootstrap 4 &amp; angular 5 admin template, Шаблон админки | Dashboard</title>
  <!-- GLOBAL MAINLY STYLES-->
  <link href="{{url('./assets/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{url('./assets/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
  <link href="{{url('./assets/vendors/themify-icons/css/themify-icons.css')}}" rel="stylesheet" />
  <!-- PLUGINS STYLES-->
  <link href="{{url('./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
  <!-- THEME STYLES-->
  <link href="{{url('assets/css/main.min.css')}}" rel="stylesheet" />
  <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
  <div class="page-wrapper">
    <!-- START HEADER-->
    @include('includes.header')
    <!-- END HEADER-->
    <!-- START SIDEBAR-->
    @include('includes.sideBar')
    <!-- END SIDEBAR-->
    <div class="content-wrapper">
      <!-- START PAGE CONTENT-->
      <div class="page-content fade-in-up">
        <!-- ANALYTICS -->
        @include('includes.analytics')

      </div>

      <!-- Basic form -->
      <div class="ibox">
        <div class="ibox-head">
          <div class="ibox-title">Basic form</div>
          <div class="ibox-tools">
            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
            <a class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item">option 1</a>
              <a class="dropdown-item">option 2</a>
            </div>
          </div>
        </div>
        <div class="ibox-body">
          <form enctype="multipart/form-data" action="{{ route('routeEditProduct.updateProduct', $product->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-sm-6 form-group">
                <label>Nom du produit</label>
                <input class="form-control" type="text" placeholder="Entrez le nom du produit" name="productName" value="{{old('productName', $product->productName)}}">
              </div>
              <div class="col-sm-6 form-group">
                <label>Prix</label>
                <input class="form-control" type="number" step="0.01" placeholder="Entrez le prix" name="productPrice" value="{{old('productPrice', $product->productPrice)}}">
              </div>
            </div>
            <div class="form-group">
              <label>Quantité</label>
              <input class="form-control" type="number" placeholder="Entrez la quantité" name="productQuantity" value="{{old('productQuantity', $product->productQuantity)}}">
            </div>
            <div class="form-group">
              <label>Image</label>
              <input class="form-control" type="file" placeholder="Entrez l'image" name="productImage" value="{{old('productImage', $product->productImage)}}">
            </div>
            <div class="form-group">
              <!-- <label>Image</label> -->
              <img src="{{url('assets/images/'.$product->productImage)}}" alt="{{$product->productImage}}" width="100px">
            </div>
            <div class="form-group">
              <button class="btn btn-outline-primary" type="submit">Modifier</button>
            </div>
          </form>
        </div>
      </div>

      <!-- END PAGE CONTENT-->
      @include('includes.footer')
    </div>
  </div>
  <!-- BEGIN THEME CONFIG PANEL-->
  <div class="theme-config">
    <div class="theme-config-toggle"><i class="fa fa-cog theme-config-show"></i><i class="ti-close theme-config-close"></i></div>
    <div class="theme-config-box">
      <div class="text-center font-18 m-b-20">SETTINGS</div>
      <div class="font-strong">LAYOUT OPTIONS</div>
      <div class="check-list m-b-20 m-t-10">
        <label class="ui-checkbox ui-checkbox-gray">
          <input id="_fixedNavbar" type="checkbox" checked>
          <span class="input-span"></span>Fixed navbar</label>
        <label class="ui-checkbox ui-checkbox-gray">
          <input id="_fixedlayout" type="checkbox">
          <span class="input-span"></span>Fixed layout</label>
        <label class="ui-checkbox ui-checkbox-gray">
          <input class="js-sidebar-toggler" type="checkbox">
          <span class="input-span"></span>Collapse sidebar</label>
      </div>
      <div class="font-strong">LAYOUT STYLE</div>
      <div class="m-t-10">
        <label class="ui-radio ui-radio-gray m-r-10">
          <input type="radio" name="layout-style" value="" checked="">
          <span class="input-span"></span>Fluid</label>
        <label class="ui-radio ui-radio-gray">
          <input type="radio" name="layout-style" value="1">
          <span class="input-span"></span>Boxed</label>
      </div>
      <div class="m-t-10 m-b-10 font-strong">THEME COLORS</div>
      <div class="d-flex m-b-20">
        <div class="color-skin-box" data-toggle="tooltip" data-original-title="Default">
          <label>
            <input type="radio" name="setting-theme" value="default" checked="">
            <span class="color-check-icon"><i class="fa fa-check"></i></span>
            <div class="color bg-white"></div>
            <div class="color-small bg-ebony"></div>
          </label>
        </div>
        <div class="color-skin-box" data-toggle="tooltip" data-original-title="Blue">
          <label>
            <input type="radio" name="setting-theme" value="blue">
            <span class="color-check-icon"><i class="fa fa-check"></i></span>
            <div class="color bg-blue"></div>
            <div class="color-small bg-ebony"></div>
          </label>
        </div>
        <div class="color-skin-box" data-toggle="tooltip" data-original-title="Green">
          <label>
            <input type="radio" name="setting-theme" value="green">
            <span class="color-check-icon"><i class="fa fa-check"></i></span>
            <div class="color bg-green"></div>
            <div class="color-small bg-ebony"></div>
          </label>
        </div>
        <div class="color-skin-box" data-toggle="tooltip" data-original-title="Purple">
          <label>
            <input type="radio" name="setting-theme" value="purple">
            <span class="color-check-icon"><i class="fa fa-check"></i></span>
            <div class="color bg-purple"></div>
            <div class="color-small bg-ebony"></div>
          </label>
        </div>
        <div class="color-skin-box" data-toggle="tooltip" data-original-title="Orange">
          <label>
            <input type="radio" name="setting-theme" value="orange">
            <span class="color-check-icon"><i class="fa fa-check"></i></span>
            <div class="color bg-orange"></div>
            <div class="color-small bg-ebony"></div>
          </label>
        </div>
        <div class="color-skin-box" data-toggle="tooltip" data-original-title="Pink">
          <label>
            <input type="radio" name="setting-theme" value="pink">
            <span class="color-check-icon"><i class="fa fa-check"></i></span>
            <div class="color bg-pink"></div>
            <div class="color-small bg-ebony"></div>
          </label>
        </div>
      </div>
      <div class="d-flex">
        <div class="color-skin-box" data-toggle="tooltip" data-original-title="White">
          <label>
            <input type="radio" name="setting-theme" value="white">
            <span class="color-check-icon"><i class="fa fa-check"></i></span>
            <div class="color"></div>
            <div class="color-small bg-silver-100"></div>
          </label>
        </div>
        <div class="color-skin-box" data-toggle="tooltip" data-original-title="Blue light">
          <label>
            <input type="radio" name="setting-theme" value="blue-light">
            <span class="color-check-icon"><i class="fa fa-check"></i></span>
            <div class="color bg-blue"></div>
            <div class="color-small bg-silver-100"></div>
          </label>
        </div>
        <div class="color-skin-box" data-toggle="tooltip" data-original-title="Green light">
          <label>
            <input type="radio" name="setting-theme" value="green-light">
            <span class="color-check-icon"><i class="fa fa-check"></i></span>
            <div class="color bg-green"></div>
            <div class="color-small bg-silver-100"></div>
          </label>
        </div>
        <div class="color-skin-box" data-toggle="tooltip" data-original-title="Purple light">
          <label>
            <input type="radio" name="setting-theme" value="purple-light">
            <span class="color-check-icon"><i class="fa fa-check"></i></span>
            <div class="color bg-purple"></div>
            <div class="color-small bg-silver-100"></div>
          </label>
        </div>
        <div class="color-skin-box" data-toggle="tooltip" data-original-title="Orange light">
          <label>
            <input type="radio" name="setting-theme" value="orange-light">
            <span class="color-check-icon"><i class="fa fa-check"></i></span>
            <div class="color bg-orange"></div>
            <div class="color-small bg-silver-100"></div>
          </label>
        </div>
        <div class="color-skin-box" data-toggle="tooltip" data-original-title="Pink light">
          <label>
            <input type="radio" name="setting-theme" value="pink-light">
            <span class="color-check-icon"><i class="fa fa-check"></i></span>
            <div class="color bg-pink"></div>
            <div class="color-small bg-silver-100"></div>
          </label>
        </div>
      </div>
    </div>
  </div>
  <!-- END THEME CONFIG PANEL-->
  <!-- BEGIN PAGA BACKDROPS-->
  <div class="sidenav-backdrop backdrop"></div>
  <div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
  </div>
  <!-- END PAGA BACKDROPS-->
  <!-- CORE PLUGINS-->
  <script src="{{url('./assets/vendors/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{url('./assets/vendors/popper.js/dist/umd/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{url('./assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}" type="text/javascript"></script>
  <script src="{{url('./assets/vendors/metisMenu/dist/metisMenu.min.js')}}" type="text/javascript"></script>
  <script src="{{url('./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
  <!-- PAGE LEVEL PLUGINS-->
  <script src="{{url('./assets/vendors/chart.js/dist/Chart.min.js')}}" type="text/javascript"></script>
  <script src="{{url('./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js')}}" type="text/javascript"></script>
  <script src="{{url('./assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
  <script src="{{url('./assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js')}}" type="text/javascript"></script>
  <!-- CORE SCRIPTS-->
  <script src="{{url('assets/js/app.min.js')}}" type="text/javascript"></script>
  <!-- PAGE LEVEL SCRIPTS-->
  <script src="{{url('./assets/js/scripts/dashboard_1_demo.js')}}" type="text/javascript"></script>
</body>

</html>