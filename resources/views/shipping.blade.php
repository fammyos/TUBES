<form class="form-horizontal" action="" method="POST">

    <div class="form-group">
        <label>From : {{$origin}} ({{$postal_origin}})</label><br>
        <label for="">To : {{$destination}}  ({{$postal_destination}})</label>
        {{-- <select name="province_destination" class="form-control province" > --}}
            {{-- <option value="">--Provinsi--</option> --}}
            {{-- <option value="{{$ccc}}">{{$ccc['value']}}</option>
        </select> --}}
        @foreach ($array_result["rajaongkir"]["results"] as $key => $value)
        <h6 class="bbb">{{$value['name']}}</h6>
        {{-- <p>{{$values['service']}}</p>
        <br>
        <p>{{$values['description']}}</p>
        <br>
        <p>ongkir: {{$values['cost'][0]['value']}}</p>
        <br>
        <p>Estimasi: {{$values['cost'][0]['etd']}} hari</p> --}}

        <table class="table" id="">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">#</th>
                    <th scope="col">Layanan</th>
                    {{-- <th scope="col">Nama Layanan</th> --}}
                    <th scope="col">Harga Ongkir</th>
                    <th scope="col" class="day">Hari</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($value["costs"] as $keys => $values)
                <tr>
                    <td scope="row"><input type="checkbox" name="eminem"  class="subject-list check-box" autocomplete="off"></td>
                    <td scope="row">{{ $loop->iteration }}</td>
                    <td>{{$values['description']}}</td>
                    {{-- <td>{{$values['description']}}</td> --}}
                    <td>@currency($values['cost'][0]['value'])</td>
                    <td>{{$values['cost'][0]['etd']}}</td>
                    <td><input type="hidden" name=""  id="kmm" value="{{$values['cost'][0]['value']}}"></td>
                </tr>
                @endforeach
                </tbody>
        </table>
        @endforeach
    </div>

</form>
