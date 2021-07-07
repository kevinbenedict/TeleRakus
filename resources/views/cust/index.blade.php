<html>
<head>
    <title>All Customer</title>
</head>

<body>

<div style="margin-top: 20px; margin-bottom: 20px">
    <table border="1">
        <a href="/cust/add"> Add New Customer</a>

        <thead>
            <td> ID </td>
            <td> Subcription ID </td>
            <td> Name </td>
            <td> Phone </td>
            <td colspan="3"> Action </td>
        </thead>
        <tbody>
            @foreach($cust as $index => $cust)
                <tr>
                    <td> {{ $index + 1 }} </td>
                    <td> {{ $cust->subscription_id }} </td>
                    <td> {{ $cust->name }} </td>
                    <td> {{ $cust->phone }} </td>
                    <td> <a href="{{ url("/cust/edit", $cust->id) }}"> Edit </a> </td>
                    <td>
                        <form method="POST" action="/cust/{{$cust->id}}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <div>
                                <input type="submit" value="Delete">
                            </div>
                        </form>
                    </td>
                    <td> <a href="{{ url('/cust/'.$cust->id.'/history') }}"> History </a> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>