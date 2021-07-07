<html>
<head>
    <title>Add Customer</title>
</head>

<body>

<div style="margin-top: 20px; margin-bottom: 20px">
    <h3> Fill customer detail </h3>
    <div>
        <form method="post" action="{{ url("/cust") }}">
            {{ csrf_field() }}
            <div>
                <label>
                    Subscription ID
                    <input name="subscription_id"/>
                </label>
            </div>

            <div>
                <label>
                    Name
                    <input name="name"/>
                </label>
            </div>

            <div>
                <label>
                    Phone
                    <input name="phone"/>
                </label>
            </div>

            <button type="submit"> Add </button>
        </form>
    </div>
</div>

</body>
</html>