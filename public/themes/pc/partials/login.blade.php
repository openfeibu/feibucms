<div class="alertBox">
    <div class="alert-login">
        <div class="padd30">
            <div class="alert-title">
                <p>用户登录</p>
                <div class="close"><img src="{!! theme_asset('images/aclose.png') !!}" alt=""></div>
            </div>
            <form action="" onSubmit="return login_form()" id="login_form">
                <div class="input-b"><input type="text" name="email" placeholder="邮箱" /></div>
                <div class="input-b"><input type="password" name="password"  placeholder="密码" /></div>
                <div class="input-s"><input type="submit" value="登录" /></div>
            </form>
            <div class="alert-des">
                <a class="getPass">忘记密码</a> 或者 还没有账号，<a class='toReg'>立即注册</a>
            </div>
        </div>
    </div>
    <div class="alert-reg">
        <div class="padd30">
            <div class="alert-title">
                <p>用户注册</p>
                <div class="close"><img src="{!! theme_asset('images/aclose.png') !!}" alt=""></div>
            </div>
            <form action="" onSubmit="return reg_form()" id="reg_form">
                <div class="input-b"><input type="text" name="name" placeholder="昵称" /></div>
                <div class="input-b"><input type="text" name="email" placeholder="邮箱" /></div>
                <div class="input-b"><input type="password" name="password"  placeholder="密码" /></div>
                <div class="input-s"><input type="submit" value="注册" /></div>
            </form>
            <div class="alert-des">
                已有账号，<a class='toLogin'>立即登录</a>
            </div>
        </div>
    </div>
    <div class="alert-reget">
        <div class="padd30">
            <div class="alert-title">
                <p>找回密码</p>
                <div class="close"><img src="{!! theme_asset('images/aclose.png') !!}" alt=""></div>
            </div>
            <form action="">
                <div class="input-b"><input type="text" name="email" placeholder="邮箱" /></div>
                <div class="input-b"><input type="text" name="code" placeholder="邮箱验证码" /></div>
                <div class="input-b"><input type="password" name="pass"  placeholder="新的密码" /></div>
                <div class="input-s"><input type="submit" value="提交" /></div>
            </form>
            <div class="alert-des">
                点错了，<a class='toLogin'>立即登录</a>
            </div>
        </div>
    </div>
</div>

<script>
    @if(session()->get('user_auth') === 0)
    $(function(){
        $(".alertBox").fadeIn(200)
        $(".alert-login").fadeIn(200)
        $(".alert-reg").hide()
        $(".alert-reget").hide()
    });
    @endif

    function reg_form()
    {
        var name = $("#reg_form").find("[name='name']").val();
        var email = $("#reg_form").find("[name='email']").val();
        var password = $("#reg_form").find("[name='password']").val();

        if(isEmpty(name) || isEmpty(email) || isEmpty(password)){
            $fb.fbNews({content:"请完善信息后提交",type:'warning'});
            return false;
        }else{
            $fb.loading({content:"请求中"});
            $.ajax({
                url : "{{ route('pc.register') }}",
                data : {'_token':"{!! csrf_token() !!}","name":name,"email":email,"password":password,"remember":1},
                type : 'post',
                dataType : "json",
                success : function (data) {
                    $fb.closeLoading();
                    if(data.code == 200)
                    {
                        window.location.href = "{{ url()->previous() }}";
                    }
                    $fb.fbNews({content:data.msg});
                },
                error : function (jqXHR, textStatus, errorThrown) {
                    $fb.closeLoading();
                    responseText = $.parseJSON(jqXHR.responseText);
                    var message =  responseText.msg;
                    if(!message)
                    {
                        message = '服务器错误';
                    }
                    $fb.fbNews({content:message,type:'warning'});
                }
            });
        }
        return false;
    }
    function login_form()
    {
        var email = $("#login_form").find("[name='email']").val();
        var password = $("#login_form").find("[name='password']").val();

        if(isEmpty(email) || isEmpty(password)){
            $fb.fbNews({content:"请完善信息后提交",type:'warning'});
            return false;
        }else{
            $fb.loading({content:"请求中"});
            $.ajax({
                url : "{{ route('pc.ajax_login') }}",
                data : {'_token':"{!! csrf_token() !!}","email":email,"password":password,"remember":1},
                type : 'post',
                dataType : "json",
                success : function (data) {
                    $fb.closeLoading();
                    if(data.code == 200)
                    {
                        window.location.href = data.url;
                    }
                    $fb.fbNews({content:data.msg});
                },
                error : function (jqXHR, textStatus, errorThrown) {
                    $fb.closeLoading();
                    responseText = $.parseJSON(jqXHR.responseText);
                    var message =  responseText.msg;
                    if(!message)
                    {
                        message = '服务器错误';
                    }
                    $fb.fbNews({content:message,type:'warning'});
                }
            });
        }
        return false;
    }
    function isEmpty(obj){
        if(typeof obj == "undefined" || obj == null || obj == ""){
            return true;
        }else{
            return false;
        }
    }
</script>
