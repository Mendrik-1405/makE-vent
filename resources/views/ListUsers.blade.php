@extends('master')

@section('description','')

@section('keywords','')


@section('title', 'listes')

@section('content')
<div class="container-fluid">
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
                                <th scope="col">nom</th>
                                <th scope="col">point de vente</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                                @foreach ($data as $row)
                                
                                <tr>
                                    <th scope="row">{{$row->id}}</th>
                                    <th scope="row">{{$row->nom}}</th>
                                    <th scope="row">{{$row->pointdevente}}</th>
                                    <th scope="row"><a href="/form_userspoint/{{$row->id}}"><i class="mdi mdi-pencil"></i></a></th>
                                </tr>
                                @endforeach
                        
                        </tbody>
                    </table>
                    {{ $data->onEachSide(2)->links() }}
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection
