@extends('master')

@section('title', 'nombre de chaque categorie place')

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

                                          <form class="form-horizontal" action="/Insert_Placelieu" method="post" enctype="multipart/form-data">
                                          @csrf
                                                <div class="card-body">
                                                      <h4 class="card-title">nombre de chaque categorie place</h4>
                                                <div class="form-group row">
                                                        @error('error')
                                                                {{$message}}
                                                        @enderror
                                                        <input type="hidden" name="lieuid" value="{{request()->route()->parameters()['lieuid']}}"/>
                                                   
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
                                                <th scope="col">designation</th>
                                                <th scope="col">vip</th>
                                                <th scope="col">reserve</th>
                                                <th scope="col">normal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                                @foreach ($data0 as $row)
                                                <tr>
                                                    <th scope="row">{{$row->id}}</th>
                                                    <th scope="row">{{$row->lieu->designation}}</th>
                                                    <th scope="row">{{$row->vip}}</th>
                                                    <th scope="row">{{$row->reserve}}</th>
                                                    <th scope="row">{{$row->normal}}</th>
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