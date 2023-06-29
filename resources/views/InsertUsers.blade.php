@extends('master')

@section('title', 'ajouter une marque')

@section('content')
<div class="container-fluid">
                    <div class="row">
                            <div class="col-md-9">
                                  <div class="card">

                                          <form class="form-horizontal" action="/insert_users" method="post" enctype="multipart/form-data">
                                          @csrf
                                                <div class="card-body">
                                                      <h4 class="card-title">Ajouter une marque</h4>
                                                <div class="form-group row">
                                                        @error('error')
                                                                {{$message}}
                                                        @enderror
                                                        <label for="fname2" class="col-sm-2 text-end control-label col-form-label">nom</label>
                                                        <div class="col-sm-9">
                                                                <input type="text" name="nom" class="form-control" id="fname2" placeholder="nom"required/>
                                                        </div>

                                                        <label for="fname3" class="col-sm-2 text-end control-label col-form-label">email</label>
                                                        <div class="col-sm-9">
                                                                <input type="text" name="email" class="form-control" id="fname3" placeholder="email"required/>
                                                        </div>

                                                        <label for="fname4" class="col-sm-2 text-end control-label col-form-label">password</label>
                                                        <div class="col-sm-9">
                                                                <input type="text" name="password" class="form-control" id="fname4" placeholder="password"required/>
                                                        </div>

                                                        <div class="col-sm-7">
                                                                <input class="btn btn-success float-end text-white" type="submit" value="inserer"/>
                                                        </div>
                                                </div>
                                          </form>

                                  </div>
                            </div>
                    </div>
            </div>
@endsection