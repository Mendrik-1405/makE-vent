@extends('master')

@section('title', 'Devis')

@section('content')
<div class="container-fluid">
    <div class="row el-element-overlay">
                            <div class="col-md-4">
                                  <div class="card">
                                        <form class="form-horizontal" action="/Insert_Evenementartiste" method="post" enctype="multipart/form-data">
                                            @csrf
                                                <div class="card-body">
                                                        <h4 class="card-title">prendre un Artiste</h4>
                                                    <div class="form-group row">
                                                            @error('error')
                                                                    {{$message}}
                                                            @enderror
                                                            <input type="hidden" name="evenementid" value="{{request()->route()->parameters()['eventid']}}"/>
                                                            <div class="col-sm-9">
                                                                    <select id="fname0" class="select2 form-select shadow-none" name="artisteid" style="width: 100%; height:36px;">
                                                                            @foreach ($data['Artiste'] as $row)
                                                                            <option value="{{$row->id}}">{{$row->nom}} tarif:{{$row->tarif}}</option>
                                                                            @endforeach
                                                                    </select>
                                                            </div>
                                                            <div class="col-sm-9">
                                                                <input type="text" name="duree" class="form-control" id="fname1" placeholder="duree"required/>
                                                            </div>
                                    
                                                            <div class="col-sm-6">
                                                                    <input class="btn btn-success float-end text-white" type="submit" value="inserer"/>
                                                            </div>
                                                    </div>
                                                </div>
                                            </form>

                                            <div class="row">   
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">id</th>
                                                            <th scope="col">nom</th>
                                                            <th scope="col">tarif</th>
                                                            <th scope="col">durée</th>
                                                            <th scope="col">Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    
                                                            @foreach ($listdata['Eartiste'] as $row)
                                                            <tr>
                                                                <td scope="row">{{$row->id}}</td>
                                                                <td scope="row">{{$row->artiste->nom}}</td>
                                                                <td scope="row">{{$row->artiste->tarif}}</td>
                                                                <td scope="row">{{$row->duree}}H</td>
                                                                <td>
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false"><i class="fas fa-pencil-alt"></i></button>
                                                                        <div class="dropdown-menu">
                                                                            <a class="dropdown-item" href="/Destroy_Evenementartiste/{{$row->id}}">Effacer</a>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                    
                                                    </tbody>
                                                </table>
                                            </div>  

                                  </div>
                            </div>
   
                            <div class="col-md-4">
                                  <div class="card">

                                    <form class="form-horizontal" action="/Insert_Evenementlieu" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="card-body">
                                                    <h4 class="card-title">choisir un lieu</h4>
                                                <div class="form-group row">
                                                        @error('error')
                                                                {{$message}}
                                                        @enderror
                                                        <input type="hidden" name="evenementid" value="{{request()->route()->parameters()['eventid']}}"/>
                                                        <div class="col-sm-9">
                                                                <select id="fname1" class="select2 form-select shadow-none" name="lieuid" style="width: 100%; height:36px;">
                                                                        @foreach ($data['Lieu'] as $row)
                                                                        <option value="{{$row->id}}">{{$row->designation}}</option>
                                                                        @endforeach
                                                                </select>
                                                        </div>
                                                        <div class="col-sm-9">
                                                                <input type="text" name="prix" class="form-control" id="fname1" placeholder="prix"required/>
                                                        </div>
                                                        <div class="col-sm-6">
                                                                <input class="btn btn-success float-end text-white" type="submit" value="inserer"/>
                                                        </div>
                                                </div>
                                            </div>
                                        </form>

                                        
                                        <div class="row">   
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">id</th>
                                                        <th scope="col">designation</th>
                                                        <th scope="col">place</th>
                                                        <th scope="col">prix</th>
                                                        <th scope="col">Edit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                
                                                        @foreach ($listdata['Elieu'] as $row)
                                                        <tr>
                                                            <td scope="row">{{$row->id}}</td>
                                                            <td scope="row">{{$row->lieu->designation}}</td>
                                                            <td scope="row">{{$row->lieu->nbrplace}}</td>
                                                            <td scope="row">{{$row->prix}}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fas fa-pencil-alt"></i></button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="/Destroy_Evenementlieu/{{$row->id}}">Effacer</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                
                                                </tbody>
                                            </table>
                                        </div>  
                                  </div>
                            </div>
                            <div class="col-md-4">
                                  <div class="card">

                                    <form class="form-horizontal" action="/Insert_Evenementlogistique" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="card-body">
                                                    <h4 class="card-title">choisir un logistique</h4>
                                                <div class="form-group row">
                                                        @error('error')
                                                                {{$message}}
                                                        @enderror
                                                        <input type="hidden" name="evenementid" value="{{request()->route()->parameters()['eventid']}}"/>
                                                        <div class="col-sm-9">
                                                                <select id="fname2" class="select2 form-select shadow-none" name="logistiqueid" style="width: 100%; height:36px;">
                                                                        @foreach ($data['Logistique'] as $row)
                                                                        <option value="{{$row->id}}">{{$row->typesono}}</option>
                                                                        @endforeach
                                                                </select>
                                                        </div>
                                                        <div class="col-sm-9">
                                                                <input type="text" name="duree" class="form-control" id="fname1" placeholder="duree"required/>
                                                        </div>
                                                        <div class="col-sm-6">
                                                                <input class="btn btn-success float-end text-white" type="submit" value="inserer"/>
                                                        </div>
                                                </div>
                                            </div>
                                        </form>

                                        <div class="row">   
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">id</th>
                                                        <th scope="col">type</th>
                                                        <th scope="col">tarif</th>
                                                        <th scope="col">duree</th>
                                                        <th scope="col">Edit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                
                                                        @foreach ($listdata['Elogistique'] as $row)
                                                        <tr>
                                                            <td scope="row">{{$row->id}}</td>
                                                            <td scope="row">{{$row->logistique->typesono}}</td>
                                                            <td scope="row">{{$row->logistique->tarif}}</td>
                                                            <td scope="row">{{$row->duree}}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fas fa-pencil-alt"></i></button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="/Destroy_Evenementlogistique/{{$row->id}}">Effacer</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                
                                                </tbody>
                                            </table>
                                        </div>  

                                  </div>
                            </div>

                    </div>
                    <div class="row el-element-overlay">
                            <div class="col-md-4">
                                  <div class="card">
                                    <form class="form-horizontal" action="/Insert_Evenementsonorisation" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="card-body">
                                                    <h4 class="card-title">choisir un sonorisation</h4>
                                                <div class="form-group row">
                                                        @error('error')
                                                                {{$message}}
                                                        @enderror
                                                        <input type="hidden" name="evenementid" value="{{request()->route()->parameters()['eventid']}}"/>
                                                        <div class="col-sm-9">
                                                                <select id="fname3" class="select2 form-select shadow-none" name="sonorisationid" style="width: 100%; height:36px;">
                                                                        @foreach ($data['Sonorisation'] as $row)
                                                                        <option value="{{$row->id}}">{{$row->typesono}}</option>
                                                                        @endforeach
                                                                </select>
                                                        </div>
                                                        <div class="col-sm-9">
                                                                <input type="text" name="duree" class="form-control" id="fname1" placeholder="duree"required/>
                                                        </div>
                                                        <div class="col-sm-6">
                                                                <input class="btn btn-success float-end text-white" type="submit" value="inserer"/>
                                                        </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">   
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">id</th>
                                                        <th scope="col">type</th>
                                                        <th scope="col">tarif</th>
                                                        <th scope="col">duree</th>
                                                        <th scope="col">Edit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                
                                                        @foreach ($listdata['Esonorisation'] as $row)
                                                        <tr>
                                                            <td scope="row">{{$row->id}}</td>
                                                            <td scope="row">{{$row->sonorisation->typesono}}</td>
                                                            <td scope="row">{{$row->sonorisation->tarif}}</td>
                                                            <td scope="row">{{$row->duree}}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fas fa-pencil-alt"></i></button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="/Destroy_Evenementsonorisation/{{$row->id}}">Effacer</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                
                                                </tbody>
                                            </table>
                                        </div> 
                                  </div>
                            </div>
                            <div class="col-md-4">
                                  <div class="card">
                                    <form class="form-horizontal" action="/Insert_Evenementautreparam" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="card-body">
                                                    <h4 class="card-title">ajouter autre parametre</h4>
                                                <div class="form-group row">
                                                        @error('error')
                                                                {{$message}}
                                                        @enderror
                                                        <input type="hidden" name="evenementid" value="{{request()->route()->parameters()['eventid']}}"/>
                                                        <div class="col-sm-9">
                                                                <select id="fname4" class="select2 form-select shadow-none" name="autreparamid" style="width: 100%; height:36px;">
                                                                        @foreach ($data['Autreparam'] as $row)
                                                                        <option value="{{$row->id}}">{{$row->designation}}</option>
                                                                        @endforeach
                                                                </select>
                                                        </div>
                                                        <div class="col-sm-9">
                                                                <input type="text" name="prix" class="form-control" id="fname1" placeholder="prix"required/>
                                                        </div>
                                                        <div class="col-sm-6">
                                                                <input class="btn btn-success float-end text-white" type="submit" value="inserer"/>
                                                        </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="row">   
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">id</th>
                                                        <th scope="col">designation</th>
                                                        <th scope="col">prix</th>
                                                        <th scope="col">edit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                
                                                        @foreach ($listdata['Eautreparam'] as $row)
                                                        <tr>
                                                            <td scope="row">{{$row->id}}</td>
                                                            <td scope="row">{{$row->autreparam->designation}}</td>
                                                            <td scope="row">{{$row->prix}}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle"
                                                                        data-bs-toggle="dropdown" aria-haspopup="true"
                                                                        aria-expanded="false"><i class="fas fa-pencil-alt"></i></button>
                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="/Destroy_Evenementautreparam/{{$row->id}}">Effacer</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                
                                                </tbody>
                                            </table>
                                        </div> 
                                  </div>
                            </div>
                            <div class="col-md-4">
                                  <div class="card">
                                        <div class="row">   
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">designation</th>
                                                        <th scope="col">date de debut</th>
                                                        <th scope="col">date de fin</th>
                                                        <th scope="col">total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                
                                                        @foreach ($listdata['Etotal'] as $row)
                                                        <tr>
                                                            <td scope="row">{{$row->designation}}</td>
                                                            <td scope="row">{{$row->datedebut}}</td>
                                                            <td scope="row">{{$row->datefin}}</td>
                                                            <td scope="row">{{$row->total}}</td>
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