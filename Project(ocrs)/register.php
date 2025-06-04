<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="registration.php" method="post">
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="name" ></td>
                
            </tr>
            <tr>
            <td>Email:</td>
            <td><input type="email" name="email" ></td>
            </tr>
            <tr>
            <td>Password:</td>
            <td><input type="password" name="password" ></td> 
            </tr>
            <tr>
            <td>confirmpassword</td>
            <td><input type="password" name="confirmpassword" ></td> 
            </tr>
            <tr>
            <td>MobileNumber:</td>
            <td><input type="number" name="MobileNumber"></td> 
            </tr>
            <tr>
            <td></td>
            <td><input type="submit" name="submit" value="registernow"></td> 
            </tr>
           
        </table>
    </form>
</body>
</html>