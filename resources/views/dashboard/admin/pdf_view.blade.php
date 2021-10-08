<style>
    table, th, td {
  border: 1px solid black;
}
</style>

<table>
    <thead>
        <tr>
            <th>User Id</th>
            <th>User Name</th>
            <th>Contact No</th>
            <th>Address</th>
        </tr>
    </thead>
    <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>00{{$item['id']}}</td>
                    <td>
                        {{$item['name']}}
                    </td>
                    <td>{{$item['phoneno']}}</td>
                    <td>{{$item['address']}},{{$item['city']}} <br><small>{{$item['state']}}</small></td>
                </tr>
                @endforeach            
              
    </tbody>
</table>