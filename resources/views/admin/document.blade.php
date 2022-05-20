<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin Dashboard</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/feather/feather.css">
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="../template/vendors/codemirror/codemirror.css">
  <link rel="stylesheet" href="../template/vendors/codemirror/ambiance.css">
  <link rel="stylesheet" href="../template/vendors/pwstabs/jquery.pwstabs.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
    <div class=" container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="main-panel w-100  documentation">
            <div class="content-wrapper">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-12 pt-5">
                    <a class="btn btn-primary" href="/admin"><i class="ti-home mr-2"></i>Back to home</a>
                  </div>
                </div>
                <div class="row pt-5 mt-5">
                  <div class="col-12 pt-5 text-center">
                    <i class="text-primary mdi mdi-file-document-box-multiple-outline display-1"></i>
                      <div class="main-panel" style="width: 100%">
                          <div class="content-wrapper">
                              <div class="row">
                                  <div class="col-md-6 grid-margin stretch-card">
                                      <div class="card">
                                          <div class="card-body">
                                              <h4 class="card-title">motivation text</h4>
                                              <form class="forms-sample" method="post" action="<?php echo route('save')?>">
                                                  {{csrf_field()}}
                                                  <div class="form-group">
                                                      <input type="text" name="desc" class="form-control" id="exampleInputUsername1" placeholder="write here...">
                                                  </div>
                                                  <button class="btn btn-primary mr-2">Submit</button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6 grid-margin stretch-card">
                                      <div class="card">
                                          <div class="card-body" style="overflow-x: scroll;max-height: 500px">
                                              <div class="card-description">
                                                  <table class="table table-dark" width="100%">
                                                      <thead>
                                                      <tr>
                                                          <th scope="col">motivation</th>
                                                      </tr>
                                                      </thead>
                                                      <tbody>
<tr>
    @foreach($all as $alls)
        @php
            $id = $alls['id'];
            $desc = $alls['desc'];
            $h = new \Hashids\Hashids();
            $hash = $h->encode($id);
            $crypt = \Illuminate\Support\Facades\Crypt::encrypt($hash);
        @endphp
    <th scope="row">
        {{$id}}
    </th>
    <td>
        {{$desc}}
    </td>
        <td>
            <form method="get" action="<?php echo route('delete',['hash'=>$crypt])?>">
                @csrf
                <input type="submit" class="btn btn-success btn-sm" value="delete">
                <input type="hidden" name="id" value="{{$crypt}}">
            </form>
        </td>
</tr>
@endforeach
                                                      </tbody>
                                                  </table>
                                              </div>

                                          </div>
                                      </div>
                                  </div>
                    </h4>
                  </div>
                </div>
              </div>
            </div>
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021 PAAK WASH</span>
          </div>
        </footer>
            <!-- partial -->
          </div>
        </div>
      </div>
<!-- plugins:js -->
<script src="../../vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="../../js/off-canvas.js"></script>
<script src="../../js/hoverable-collapse.js"></script>
<script src="../../js/template.js"></script>
<script src="../../js/settings.js"></script>
<script src="../../js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="../../js/codeEditor.js"></script>
<script src="../../js/tabs.js"></script>
<script src="../../js/tooltips.js"></script>
<script src="../../js/documentation.js"></script>
<!-- End custom js for this page-->
</body>

</html>
