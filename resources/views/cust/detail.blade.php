<html>
<head>
    <title>Customer Detail</title>
</head>

<body>

<div style="margin-top: 20px; margin-bottom: 20px">
    <a href="/cust"> All customer list </a>

    <p> Customer Detail </p>
    <p> Subscription ID <b> {{ $cust->subscription_id }} </b> </p>
    <p> Name <b> {{ $cust->name }} </b> </p>
    <p> Phone Number <b> {{ $cust->phone }} </b> </p>
</div>

</body>
</html>