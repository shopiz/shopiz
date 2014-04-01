<?php
    $this->assets->collection('head')
        ->addCss("ui/css/??login.css");
    $this->assets->collection('footer')
        ->addJs("ui/js/??login.js");
?>
    <div class="logo">
        <img src="/ui/images/logo-big.png" alt="" />
    </div>

    <div class="content">

        <form class="form-vertical login-form" action="/default/login">
            <h3 class="form-title">用户登录</h3>
            <div class="alert alert-error hide">
                <button class="close" data-dismiss="alert"></button>
                <span>请输入你的用户名和密码</span>
            </div>

            <div class="control-group">
                <label class="control-label visible-ie8 visible-ie9">用户名</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="icon-user"></i>
                        <input class="m-wrap placeholder-no-fix" type="text" placeholder="用户名" name="username"/>
                    </div>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label visible-ie8 visible-ie9">密码</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="icon-lock"></i>
                        <input class="m-wrap placeholder-no-fix" type="password" placeholder="密码" name="password"/>
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <label class="checkbox">
                <input type="checkbox" name="remember" value="1"/> 记住密码
                </label>
                <button type="submit" class="btn blue pull-right">
                登录 <i class="m-icon-swapright m-icon-white"></i>
                </button>
            </div>

            <div class="forget-password">
                <h4>忘记密码了 ?</h4>
                <p>
                    别担心, 点击 <a href="javascript:;" class="" id="forget-password">这里</a> 去重设你的密码
                </p>
            </div>

            <div class="create-account">
                <p>
                    还没有帐号吗 ?&nbsp;
                    <a href="javascript:;" id="register-btn" class="">注册帐号</a>
                </p>
            </div>
        </form>

        <form class="form-vertical forget-form" action="/default/forget">
            <h3 class="">忘记密码了 ?</h3>
            <p>输入你的邮件地址去重置你的密码</p>
            <div class="control-group">
                <div class="controls">
                    <div class="input-icon left">
                        <i class="icon-envelope"></i>
                        <input class="m-wrap placeholder-no-fix" type="text" placeholder="邮箱" name="email" />
                    </div>
                </div>
            </div>

            <div class="form-actions">
                <button type="button" id="back-btn" class="btn">
                    <i class="m-icon-swapleft"></i> 返回
                </button>
                <button type="submit" class="btn blue pull-right">
                提交 <i class="m-icon-swapright m-icon-white"></i>
                </button>
            </div>
        </form>

        <form class="form-vertical register-form" action="/default/register">
            <h3 class="">用户注册</h3>
            <p>在下面输入您的帐户资料:</p>
            <div class="control-group">
                <label class="control-label visible-ie8 visible-ie9">用户名</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="icon-user"></i>
                        <input class="m-wrap placeholder-no-fix" type="text" placeholder="用户名" name="username"/>
                    </div>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label visible-ie8 visible-ie9">密码</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="icon-lock"></i>
                        <input class="m-wrap placeholder-no-fix" type="password" id="register_password" placeholder="密码" name="password"/>
                    </div>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label visible-ie8 visible-ie9">确认密码</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="icon-ok"></i>
                        <input class="m-wrap placeholder-no-fix" type="password" placeholder="确认密码" name="rpassword"/>
                    </div>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label visible-ie8 visible-ie9">邮箱</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="icon-envelope"></i>
                        <input class="m-wrap placeholder-no-fix" type="text" placeholder="邮箱" name="email"/>
                    </div>
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                    <input type="checkbox" name="tnc" /> I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                    </label>
                    <div id="register_tnc_error"></div>
                </div>
            </div>

            <div class="form-actions">
                <button id="register-back-btn" type="button" class="btn">
                    <i class="m-icon-swapleft"></i>  返回
                </button>
                <button type="submit" id="register-submit-btn" class="btn blue pull-right">
                注册 <i class="m-icon-swapright m-icon-white"></i>
                </button>

            </div>

        </form>
    </div>
