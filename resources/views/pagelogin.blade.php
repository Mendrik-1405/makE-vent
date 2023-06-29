<!DOCTYPE html>
<html lang="en">
<head>
    <link href="{{asset('assets/dist/css/style.min.css')}}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="main-wrapper">
        <div class="row">
            <center>
            <div class="col-md-4">
                <div class="card">
                    <div class="auth-box border-top border-secondary">
                        <div id="loginform">
                            <div class="text-center pt-3 pb-3">
                                <h4>Login</h4>
                            </div>
                            <form class="form-horizontal mt-3" id="loginform" action="/users/connect" method="post">
                                @csrf
                                <div class="row pb-4">
                                    <div class="col-12">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i class="ti-user"></i></span>
                                            </div>
                                            <input type="text" name="name" value="manager" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required="">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i class="ti-pencil"></i></span>
                                            </div>
                                            <input type="text" name="password" value="root" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row border-top border-secondary">
                                    <div class="col-12">
                                        <div class="form-group">
                                        @error('error')
                                            {{$message}}
                                        @enderror
                                            <div class="pt-3">
                                                <button class="btn btn-success float-end text-white" type="submit">Login</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </center>
        </div>
    </div>
</body>
</html>