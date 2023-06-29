@extends('master')

@section('title', 'nombre de place vendu')

@section('content')
<div class="container-fluid">
                    <div class="row">
                            <div class="col-md-9">
                                  <div class="card">
                                    <?php 
                                    $vip=null;
                                    $reserve=null;
                                    $normal=null;
                                     ?>
                                    @foreach ($data0 as $row)
                                        <?php 
                                            $vip=$row->vip;
                                            $reserve=$row->reserve;
                                            $normal=$row->normal;
                                        ?>
                                    @endforeach

                                          <form class="form-horizontal" action="/Insert_Placevendu" method="post" enctype="multipart/form-data">
                                          @csrf
                                                <div class="card-body">
                                                      <h4 class="card-title">nombre de place vendu</h4>
                                                      @error('error')
                                                              {{$message}}
                                                      @enderror
                                                <div class="form-group row">
                                                        <input type="hidden" name="evenementid" value="{{request()->route()->parameters()['evenementid']}}"/>
                                                   
                                                        <label for="fname0" class="col-sm-2 text-end control-label col-form-label">vip</label>
                                                        <div class="col-sm-9">
                                                                <input type="text" name="vip" class="form-control" id="fname0" value="{{$vip}}" placeholder="nombre de VIP"required/>
                                                        </div>

                                                        <label for="fname1" class="col-sm-2 text-end control-label col-form-label">reservé</label>
                                                        <div class="col-sm-9">
                                                                <input type="text" name="reserve" class="form-control" id="fname1" value="{{$reserve}}" placeholder="reserve"required/>
                                                        </div>

                                                        <label for="fname2" class="col-sm-2 text-end control-label col-form-label">normal</label>
                                                        <div class="col-sm-9">
                                                                <input type="text" name="normal" class="form-control" id="fname2" value="{{$normal}}" placeholder="normal"required/>
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
                                                <th scope="col">id</th>
                                                <th scope="col">normal</th>
                                                <th scope="col">reserve</th>
                                                <th scope="col">vip</th>
                                                <th scope="col">recette</th>
                                                <th scope="col">depense</th>
                                                <th scope="col">benefice brut</th>
                                                <th scope="col">benefice net</th>
                                                <th scope="col">taxe</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                                @foreach ($data2 as $row)
                                                <tr>
                                                    <th scope="row">{{$row->id}}</th>
                                                    <th scope="row">{{$row->nbrnormal}}</th>
                                                    <th scope="row">{{$row->nbrreserve}}</th>
                                                    <th scope="row">{{$row->nbrvip}}</th>
                                                    <th scope="row">{{number_format($row->recette, 2, ',', '.')}}</th>
                                                    <th scope="row">{{number_format($row->depense, 2, ',', '.')}}</th>
                                                    <th scope="row">{{number_format($row->beneficebrut, 2, ',', '.')}}</th>
                                                    <th scope="row">{{number_format($row->beneficenet, 2, ',', '.')}}</th>
                                                    <th scope="row">{{$row->pourcentagetaxe}}%</th>
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