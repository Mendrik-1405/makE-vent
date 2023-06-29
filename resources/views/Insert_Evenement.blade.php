@extends('master')

@section('title', 'ajouter un Evenement')

@section('content')
<div class="container-fluid">
                    <div class="row">
                            <div class="col-md-9">
                                  <div class="card">

                                          <form class="form-horizontal" action="/Insert_Evenement" method="post" enctype="multipart/form-data">
                                          @csrf
                                                <div class="card-body">
                                                      <h4 class="card-title">Ajouter un Evenement</h4>
                                                <div class="form-group row">
                                                        @error('error')
                                                                {{$message}}
                                                        @enderror
                                                        <label for="fname1" class="col-sm-2 text-end control-label col-form-label">designation</label>
                                                        <div class="col-sm-9">
                                                                <input type="text" name="designation" class="form-control" id="fname1" placeholder="designation"required/>
                                                        </div>

                                                        <label for="fname2" class="col-sm-2 text-end control-label col-form-label">date de debut</label>
                                                        <div class="col-sm-9">
                                                                <input type="datetime-local" name="datedebut" class="form-control" id="fname2" placeholder="date de debut"required/>
                                                        </div>
                                                        <label for="fname3" class="col-sm-2 text-end control-label col-form-label">date de fin</label>
                                                        <div class="col-sm-9">
                                                                <input type="datetime-local" name="datefin" class="form-control" id="fname3" placeholder="date de fin"required/>
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
                                                <h3 class="card-title mb-0">Listes de Evenement</h3>
                                            </div>
                                        </center>
                                    </div>
                                <div class="row" style="margin-top: 10px">   
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">id</th>
                                                <th scope="col">designation</th>
                                                <th scope="col">date de debut</th>
                                                <th scope="col">date de fin</th>
                                                <th scope="col">action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                                @foreach ($data0 as $row)
                                                <tr>
                                                    <th scope="row">{{$row->id}}</th>
                                                    <th scope="row">{{$row->designation}}</th>
                                                    <th scope="row">{{$row->datedebut}}</th>
                                                    <th scope="row">{{$row->datefin}}</th>
                                                    <th>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">Primary</button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="/Evenement/Devis/{{$row->id}}">Devis</a>
                                                                <a class="dropdown-item" href="/List_Prixplaceevenement/{{$row->id}}">recette&benefice</a>
                                                                <a class="dropdown-item" href="/List_Placevendu/{{$row->id}}">place vendu</a>
                                                                <a class="dropdown-item" href="/List_Pie/{{$row->id}}">diagramme</a>
                                                                <a class="dropdown-item" href="/Evenementbis/{{$row->designation}}/{{$row->id}}">Bis</a>
                                                                <a class="dropdown-item" href="/EvenementPDF/{{$row->designation}}/{{$row->id}}">genPDF</a>
                                                            </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                                @endforeach
                                        
                                        </tbody>
                                    </table>
                                    
                                </div>    
                            </div>
                        </div>
                    </div>
</div>
@endsection