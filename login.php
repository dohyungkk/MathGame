<?php session_start();?>
<?php include("include/header.php");?>
<div class="row">
    <div class="col-sm-10 col-sm-offset-2"><h1>Please login to enjoy our math game.</h1></div>
</div>
<form action="authenticate.php" method="post" class="form-horizontal">
    <div class="form-group">
        <div class="col-lg-12 row">
        <div class="col-sm-2 col-sm-offset-1">Email:</div>
        <div class="col-sm-5">
            <input type="email" class="form-control" id="email" name="email" 
                   placeholder="Please enter your E-mail" size="6" />
        </div>
        <div class="col-sm-4"></div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-12 row">
            <div class="col-sm-2 col-sm-offset-1">Password:</div>
            <div class="col-sm-5">
                <input type="password" class="form-control" id="password" name="password" 
                       placeholder="Please enter your Password" size="6" />
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    <div class="col-lg-12 row">
        <div class="col-sm-2 col-sm-offset-3 row">
            <button type="submit" class="btn btn-default">Login</button>
        </div>
    </div>
    <div class="col-sm-5 col-sm-offset-3 row error">
        <?php if(isset($_GET[msg])){
            echo $_GET[msg];
        }?>
    </div>
</form>
<?php include("include/foot.php");?>