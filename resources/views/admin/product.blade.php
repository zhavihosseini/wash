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
                                                    <h4 class="card-title">Product</h4>
                                                    <form method="post" action="<?php echo route('saveproduct')?>">
                                                        @csrf
                                                            <input type="text" name="icon" class="form-control" placeholder="icon" required>
                                                            <input type="text" name="title" class="form-control" placeholder="title" required>
                                                            <input type="number" name="nonint" class="form-control" placeholder="nonint" required>
                                                            <input type="number" name="price" class="form-control" placeholder="price" required>
                                                        <input type="submit" name="sub">
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
                                                                <th scope="col">id</th>
                                                                <th scope="col">icon</th>
                                                                <th scope="col">title</th>
                                                                <th scope="col">nonint</th>
                                                                <th scope="col">price</th>
                                                                <th scope="col">status</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($product as $pro)
                                                                @php
                                                                    $id = $pro['id'];
                                                                    $icon = $pro['icon'];
                                                                    $title = $pro['title'];
                                                                    $nonint = $pro['nonint'];
                                                                    $price = $pro['price'];
                                                                    $hash = new \Hashids\Hashids();
                                                                    $cr = $hash->encode($id);
                                                                    $v = \Illuminate\Support\Facades\Crypt::encrypt($cr);
                                                                @endphp
                                                            <tr>
                                                                    <th scope="row">
                                                                        {{$id}}
                                                                    </th>
                                                                    <td>
                                                                        {{$icon}}
                                                                    </td>
                                                                <td>
                                                                    {{$title}}
                                                                </td>
                                                                <td>
                                                                    {{$nonint}}
                                                                </td>
                                                                <td>
                                                                    {{$price}}
                                                                </td>
                                                                    <td>
                                                                        <form method="post" action="<?php echo route('deleteproduct',['hash'=>$v])?>">
                                                                            @csrf
                                                                            <input type="submit" class="btn btn-success btn-sm" value="delete">
                                                                            <input type="hidden" name="id" value="{{$v}}">
                                                                        </form>
                                                                    </td>

                                                                <td>
                                                                    <form method="get" action="<?php echo route('updateproduct',['hash'=>$v])?>">
                                                                        @csrf
                                                                        <input type="hidden" name="id" value="{{$v}}">
                                                                        <input type="submit" class="btn btn-success btn-sm" value="update">
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
