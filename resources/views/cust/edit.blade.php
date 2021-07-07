<html>
<head>
    <title>Edit Customer</title>
</head>

<body>

<div style="margin-top: 20px; margin-bottom: 20px">
    <a href="/cust"> All customer list </a>

    <h3> Please change the data you want to update </h3>
    <div>
        <form method="post" action="{{ url("/cust", $cust->id) }}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div>
                <label>
                    Subscription ID
                    <input name="subscription_id" value="{{ $cust->subscription_id }}"/>
                </label>
            </div>

            <div>
                <label>
                    Name
                    <input name="name" value="{{ $cust->name }}"/>
                </label>
            </div>

            <div>
                <label>
                    Phone Number
                    <input name="phone" value="{{ $cust->phone }}"/>
                </label>
            </div>

            <button type="submit"> Update </button>
        </form>
    </div>
</div>

</body>
</html>