<html>
<head>
    <title>Call History</title>
</head>

<body>

<div style="margin-top: 20px; margin-bottom: 20px">
    <table border="1">
        <a href="/cust"> All customer list</a>
        
        <thead>
            <td> No. </td>
            <td> Name </td>
            <td> Duration </td>
        </thead>
        <tbody>
            @foreach($result as $index => $result)
                <tr>
                    <td> {{ $index + 1 }} </td>
                    <td> {{ $result->name}} </td>
                    <td> {{ $result->total_duration }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>