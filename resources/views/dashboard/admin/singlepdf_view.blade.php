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
        <tr>
            <td>00 @php
                echo $singledata->id;
                @endphp 
            </td>
            <td>@php
                echo $singledata->name;
                @endphp 
            </td>
            <td>@php
                echo $singledata->phoneno;
                @endphp 
            </td>
            <td>@php
                echo $singledata->address;
                @endphp 
            </td>
         </tr> 
    </tbody>
</table>