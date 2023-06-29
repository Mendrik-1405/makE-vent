@extends('master')

@section('title', 'ajouter reference')

@section('content')
<div class="container-fluid">
                    <div class="row">
                            <div class="col-md-9">
                                  <div class="card">

                                          <form class="form-horizontal" action="/insert_userspoint" method="post" enctype="multipart/form-data">
                                          @csrf
                                                <div class="card-body">
                                                      <h4 class="card-title">assigner point de vente</h4>
                                                <div class="form-group row">
                                                        @error('error')
                                                                {{$message}}
                                                        @enderror
                                                       
                                                                <input type="hidden" name="usersid" value="{{request()->route()->parameters()['idusers']}}"/>
                                                       
                                                        <label for="fname2" class="col-sm-2 text-end control-label col-form-label">point de vente</label>
                                                        <div class="col-sm-9">
                                                                <select class="select2 form-select shadow-none" name="pointdeventeid" style="width: 100%; height:36px;">
                                                                @foreach ($data as $row)
                                                                    <option value="{{$row->id}}">{{$row->designation}}</option>
                                                                @endforeach
                                                                </select>
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