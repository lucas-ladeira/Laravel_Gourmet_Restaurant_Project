<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width initial-scale=1.0">
  <title>Products | Admin Dashboard</title>
  <!-- GLOBAL MAINLY STYLES-->
  <link href="./assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <link href="./assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
  <!-- PLUGINS STYLES-->
  <link href="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
  <!-- THEME STYLES-->
  <link href="assets/css/main.min.css" rel="stylesheet" />
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
      <div class="ibox">
        <div class="ibox-head">
          <!-- <div class="ibox-title">Responsive Table</div> -->
          <a href="{{url('addProductRoute')}}">
            <button class="btn btn-primary p-2">Ajouter un produit</button>
          </a>
        </div>
        <div class="ibox-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th width="50px"></th>
                  <th>Image</th>
                  <th>ID</th>
                  <th>Nom du produit</th>
                  <th>Prix</th>
                  <th>Quantité</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($products as $p)
                <tr>
                  <td class="align-middle">
                    <label class="ui-checkbox">
                      <input type="checkbox">
                      <span class="input-span"></span>
                    </label>
                  </td>
                  <td><img src="{{url('assets/images/'.$p->productImage)}}" alt="" height="100px" width="50px"></td>
                  <td class="align-middle">{{$p->id}}</td>
                  <td class="align-middle">{{$p->productName}}</td>
                  <td class="align-middle">{{ number_format($p->productPrice, 2, '.', '') }} $</td>
                  <td class="align-middle">{{$p->productQuantity}}</td>
                  <td class="align-middle">

                    <a href="{{ route('routeEditProduct.editProduct', $p->id) }}">
                      <button class="btn btn-outline-secondary btn-xs m-r-5 m-1" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil font-14"></i></button>
                    </a>

                    <!-- <form action="{{ route('deleteProductRoute.deleteProduct', $p->id) }}" method="post">
                      @csrf
                      @method('DELETE') -->
                    <button type="button" class="btn btn-outline-danger btn-xs m-1"
                      onclick="confirmDelete('{{ $p->id }}')">
                      <i class="fa fa-trash font-14"></i>
                    </button>
                    <!-- </form> -->
                    <!-- Formulário oculto -->
                    <form id="delete-form-{{ $p->id }}" action="{{ route('deleteProductRoute.deleteProduct', $p->id) }}" method="POST" style="display: none;">
                      @csrf
                      @method('DELETE')
                    </form>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>
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
  <script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
  <script src="./assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
  <script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="./assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
  <script src="./assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- PAGE LEVEL PLUGINS-->
  <script src="./assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
  <script src="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
  <script src="./assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
  <script src="./assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
  <!-- CORE SCRIPTS-->
  <script src="assets/js/app.min.js" type="text/javascript"></script>
  <!-- PAGE LEVEL SCRIPTS-->
  <script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>

  <script>
    function confirmDelete(id) {
      Swal.fire({
        title: 'Confirmer la suppression',
        text: "Voulez-vous vraiment supprimer ce produit ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Oui, supprimer',
        cancelButtonText: 'Annuler'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('delete-form-' + id).submit();
        }
      });
    }
  </script>

</body>

</html>