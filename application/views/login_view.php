<head>    
    <title>Login Page</title>
</head>
<body>
    <div id='login_form'>
        <form action='login/verify' method='post'>
            <h1>User Login</h1>
            <br />            
            <label for='name'>Username</label>
            <input type='text' name='name' id='name' size='25' /><br />
        
            <label for='password'>Password</label>
            <input type='password' name='password' id='password' size='25' /><br />                            
            <input type="hidden" id="callback" name='callback' value='http://<?=$curl?>'>
            <input type='Submit' value='Login' />            
        </form>
    </div>
</body>
</html>
