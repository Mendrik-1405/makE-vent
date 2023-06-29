@extends('master')

@section('title', 'ajouter un artiste')

@section('content')
<div class="container-fluid">
                    <div class="row">
                            <div class="col-md-9">
                                  <div class="card">

                                          <form class="form-horizontal" action="/Insert_Artiste" method="post" enctype="multipart/form-data">
                                          @csrf
                                                <div class="card-body">
                                                      <h4 class="card-title">Ajouter un artiste</h4>
                                                <div class="form-group row">
                                                        @error('error')
                                                                {{$message}}
                                                        @enderror
                                                        <label for="fname2" class="col-sm-2 text-end control-label col-form-label">nom</label>
                                                        <div class="col-sm-9">
                                                                <input type="text" name="nom" class="form-control" id="fname2" placeholder="nom"required/>
                                                        </div>

                                                        <label for="fname2" class="col-sm-2 text-end control-label col-form-label">tarif</label>
                                                        <div class="col-sm-9">
                                                                <input type="text" name="tarif" class="form-control" id="fname2" placeholder="tarif"required/>
                                                        </div>
                                                        <label for="validatedCustomFile" class="col-sm-2 text-end control-label col-form-label">photo</label>
                                                        <div class="col-sm-9">
                                                                <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="validatedCustomFile"
                                                                            name="photo" accept=".jpg,.jpeg,.png" required>
                                                                        <label class="custom-file-label" for="validatedCustomFile">Choose
                                                                            file...</label>
                                                                    </div>
                                                        </div>
                                                        <div class="col-sm-7">
                                                                <input class="btn btn-success float-end text-white" type="submit" value="ajouter"/>
                                                        </div>
                                                </div>
                                          </form>

                                  </div>
                            </div>

                    </div>

                    <div class="row el-element-overlay">
                        <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <center>
                                            <div class="col-md-5">
                                                <h3 class="card-title mb-0">Listes</h3>
                                            </div>
                                        </center>
                                    </div>
                                <div class="row" style="margin-top: 10px">   
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">photo</th>
                                                <th scope="col">id</th>
                                                <th scope="col">nom</th>
                                                <th scope="col">tarif</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                                @foreach ($data0 as $row)
                                                <tr>
                                                    <th scope="row"><img src="data:image/png;base64,{{$row->photo}}" class="rounded-circle" alt="{{$row->nom}}" width="31"/></th>
                                                    <th scope="row">{{$row->id}}</th>
                                                    <th scope="row">{{$row->nom}}</th>
                                                    <th scope="row">{{$row->tarif}}</th>
                                                </tr>
                                                @endforeach
                                        
                                        </tbody>
                                    </table>
                                    {{ $data0->onEachSide(2)->links() }}
                                </div>    
                            </div>
                        </div>
                    </div>
</div>
@endsection