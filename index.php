<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>zero-question-list</title>
    <script src="lib/jquery-3.1.4.js"></script>
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <script src="lib/bootstrap.min.js"></script>
    <link href="styles/main.less" rel="stylesheet/less">
    <script src="lib/less-3.9.0.min.js"></script>
</head>

<body>
    <!-- 这是一个来自于 bootstrap 的导航栏代码 -->
    <nav class="navbar navbar-default" id="my-nav">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">问题列表页</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">
                            <?php 
                                // 判断用户的登录情况
                                session_start();
                                // 1. 判断 cookie 中是否有那个我们自己给的 cookie
                                // 如果有，把 cookie 的数据写入到 session
                                if(isset($_COOKIE['name'])){
                                    $_SESSION['name'] = $_COOKIE['name'];
                                }
                                // 2. 判断 session 中是否有数据
                                if(!isset($_SESSION['name'])){
                                    // session 没数据，跳转到登录页
                                    header('Location: login.php');
                                }
                                // 打印出用户名，这个用户名用于页面的导航栏显示
                                echo $_SESSION['name'];
                            ?>
                            <span class="caret"></span>
                        </a>
                        <!-- 导航栏的下拉菜单 -->
                        <ul class="dropdown-menu">
                            <li><a id="logout-btn" href="#">登出</a></li>
                        </ul>
                        <!-- 导航栏的下拉菜单 [完]-->
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- 这是一个来自于 bootstrap 的导航栏代码 [完]-->

    <main>

        <!-- 提交问题的表单 -->
        <form id="submit-question-form" class="form-inline">
            <div class="form-group">
                <input id="question-input" class="form-control" name="question" placeholder="请输入你要提交的问题">
            </div>
            <button type="submit" class="btn btn-primary">提交</button>
        </form>
        <p class="bg-danger" id="error-text"></p>

        <!-- 提交问题的表单 [完]-->

        <!-- 问题列表 -->
        <h1>问题列表</h1>

        <div id="question-list">
            <?php
            // 引入问题列表
            include_once("handler/questionList.php");    
            ?>
        </div>


        <!-- 问题列表 [完] -->
    </main>
    <script>

        // 提交一个新问题的逻辑
    $("#submit-question-form").submit(function(e) {
        $("#error-text").html("");
        e.preventDefault();
        $.ajax({
            url: "handler/createQuestion.php",
            type: "post",
            data: $("#submit-question-form").serialize(),
            success: function(data) {
                if (data === "fail") {
                    $("#error-text").html("提交问题发生了未知的错误");
                    return;
                }
                $("#question-list").html(data);
                bindCloseBtnEvent();
                $("#question-input").val("");
            }
        });
    });

    // 给删除按钮绑定事件(递归)
    function bindCloseBtnEvent() {
        $(".close-btn").click(function() {
            $("#error-text").html("");
            var id = $(this).data("id");
            // 删除问题的逻辑
            $.ajax({
                url: "handler/deleteQuestion.php",
                type: "post",
                data: {
                    id: id
                },
                success: function(data) {
                    if (data === "fail") {
                        $("#error-text").html("删除问题发生了未知的错误");
                        return;
                    }
                    $("#question-list").html(data);
                    bindCloseBtnEvent();
                }
            });
        });
    }
    bindCloseBtnEvent();

    // 登出的逻辑
    $("#logout-btn").click(function(){
        $.ajax({
            url: "handler/logout.php",
            type: "post",
            success: function(data) {
                location.href= "login.php";
            }
        });
    });
    </script>
</body>

</html>