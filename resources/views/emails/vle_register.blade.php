<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />


<style type="text/css">

</style>
</head>
<body style="background-color: #f4f4f4; padding: 15px !important;">

<!-- HIDDEN PREHEADER TEXT -->
<div >
    <p>Dear {{$data->name}}, Your registration succesfully</p>
    <p>You can login using below Link and Credentials</p>
    <p><a href="https://clinic.medyseva.com/auth/login">Click To Login</a></p>
    <p>Email : {{$data->email}}</p>
    <p>Password : {{$data->password}}</p>
</div>
    
</body>
</html>

