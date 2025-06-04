<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>email</title>
    <style>
        *{
            margin:0;
            padding:0;
        }
        .maindiv{
            
            border-radius: 10px;
            box-shadow: 4px 4px 10px 0 rgba(0,0,0,0.25);
        }
        .input{
            height:100px;
            width:500px;
        }
        .frm{
            margin-top: 30px;
        }
        
        </style>
</head>
<body>
    
        <form class="frm" action="send-mail.php" method="post">
            <div class="maindiv">
            <label for="name">Name</label>
        <input type="text" placeholder="Enter username!" class="input" name="name"id="name">
        </div>
        <div class="maindiv">
            <label for="email">Email</label>
        <input type="email" placeholder="Enter email!" class="input" name="email"id="name">
        </div>
        <div class="maindiv">
            <label for="message">Message</label>
        <textarea type="textarea" placeholder="Enter username!" class="input" name="msg"id="" rows="5"></textarea>
        </div>
        <input type="submit" class="btn" value="Send message">
        
    </div>
</body>
</html>