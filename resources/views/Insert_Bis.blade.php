@extends('master')

@section('title', 'ajouter un bis')

@section('content')
<div class="container-fluid">
                    <div class="row">
                            <div class="col-md-9">
                                  <div class="card">

                                          <form class="form-horizontal" action="/Insert_Bis" method="post" enctype="multipart/form-data">
                                          @csrf
                                                <div class="card-body">
                                                      <h4 class="card-title">Ajouter un bis</h4>
                                                <div class="form-group row">
                                                        @error('error')
                                                                {{$message}}
                                                        @enderror
                                                        <input type="hidden" name="evenementid" value="{{request()->route()->parameters()['evenementid']}}"/>
                                                        <input type="hidden" name="evenement" value="{{request()->route()->parameters()['evenement']}}"/>

                                                        <label for="fname2" class="col-sm-2 text-end control-label col-form-label">date de debut</label>
                                                        <div class="col-sm-9">
                                                                <input type="datetime-local" name="datedebut" class="form-control" id="fname2" placeholder="date de debut"required/>
                                                        </div>
                                                        <div class="col-sm-7">
                                                                <input class="btn btn-success float-end text-white" type="submit" value="ajouter"/>
                                                        </div>
                                                </div>
                                          </form>

                                  </div>
                            </div>

                    </div>

</div>
@endsection