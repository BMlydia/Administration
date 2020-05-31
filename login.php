<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登录</title>
    <script src="lib/jquery-3.1.4.js"></script>
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <script src="lib/bootstrap.min.js"></script>
    <link href="styles/register.less" rel="stylesheet/less">
    <script src="lib/less-3.9.0.min.js"></script>
</head>
<body>
    <main>
        <h1 class="text-center">登录</h1>

        <form id="login-form">

            <div class="form-group">
                <label for="email">邮箱</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="请输入你的邮箱">
            </div>

            <div class="form-group">
                <label for="password">密码</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="请输入你的密码">
            </div>
            

            <!-- bg-danger：显示出错的红色背景 -->
            <p class="bg-danger" id="error-text"></p>

            <div class="text-right"></div>  <!-- ？ -->

            <!-- login-btn: ? -->
            <!-- btn btn-success: 表示一个成功的或积极的动作 -->
            <button id="login-btn" class="btn btn-success" type="submit">登录</button>
        
        </form>

    </main>

    <script>        

        $("#login-form").submit(function(e){
            e.preventDefault();     //阻止默认的异步行为 ，进行异步提交
            $.ajax({
                url:"handler/auth.php",
                type:"post",
                data:$("#login-form").serialize(),  //serialize()：输出序列化表单值的结果
                success:function(data){             //success指的是请求并成功返回信息
                    if(data==="success"){
                        location.href="index.php";  //成功的话跳到问题列表index.php页面
                        return;
                    }

                    //elae出错的话，将data的内容按html解析输出到id为error-text的元素中
                    $("#error-text").html(data);
                }
            });
        });

    </script>
</body>
</html>