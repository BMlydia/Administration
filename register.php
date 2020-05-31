<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>注册</title>
    <script src="lib/jquery-3.1.4.js"></script>
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <script src="lib/bootstrap.min.js"></script>
    <link href="styles/register.less" rel="stylesheet/less">
    <script src="lib/less-3.9.0.min.js"></script>
</head>
<body>
    <main>
        <h1 class="text-center">注册</h1>
        <form id="register-form">
            <div class="form-group">
                <label for="email">邮箱</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="请输入你的邮箱">
            </div>

            <div class="form-group">
                <label for="password">密码</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="请输入你的密码">
            </div>

            <!-- <div class="form-group">
                <label for="repeat-password">重复密码</label>
                <input type="password" class="form-control" id="repeat-password" placeholder="请再次输入你的密码">
            </div> -->

            
            <div class="form-group">
                <label for="nick-name">昵称</label>
                <input class="form-control" name="nickName" id="nick-name" placeholder="请输入你的昵称">
            </div>
            <p class="bg-danger" id="error-text"></p>
            <div class="text-right">
                <!-- <button type="submit" class="btn btn-success">注册</button> -->
            </div>
            <button id="register-btn" class="btn btn-success" type="submit">注册</button>
        </form>
        <!-- <iframe id="register-frame" name="register-frame" class="hidden"></iframe> -->
        


    </main>
    <script>
        // var registerFrame = document.getElementById("register-frame");
        // registerFrame.addEventListener("load",function(){
        //     var result = registerFrame.contentDocument.body.innerHTML;
        //     if(result==="success"){
        //         location.href = "index.php";
        //     }else{
        //         document.getElementById("error-text").innerHTML = result;
        //     }
        // });
        

        $("#register-form").submit(function(e){
            e.preventDefault();
            $.ajax({
                url:"handler/newAccount.php",
                type:"post",
                data:$("#register-form").serialize(),
                success:function(data){
                    $("#error-text").html(data);
                }
            });
        });


    
    </script>
</body>
</html>