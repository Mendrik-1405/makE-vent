<div>   
          <table>
            <tr>
              @foreach ($data0 as $row)
                  <td><img src="data:image/png;base64,{{$row->artiste->photo}}" class="rounded-circle" alt="{{$row->artiste->nom}}" width="100"/>{{$row->artiste->nom}}</td>   
              @endforeach
            </tr>
          </table>
          @foreach ($data1 as $row)
          <img src="data:image/png;base64,{{$row->lieu->photo}}" class="rounded-circle" alt="{{$row->lieu->nom}}" width="100"/>
          {{$row->lieu->designation}}
          <br><h3>{{$row->evenement->designation}}</h3>
          <br><h3>{{\Carbon\Carbon::parse($row->evenement->datedebut)->isoFormat('DD MMMM YYYY')}}</h3>
          @endforeach
          @foreach ($data2 as $row)
              <strong>prix vip :{{$row->prixvip}}Ar</strong><br>
              <strong>prix reservé :{{$row->prixreserve}}Ar</strong><br>
              <strong>prix normal :{{$row->prixnormal}}Ar</strong>
          @endforeach
</div>  