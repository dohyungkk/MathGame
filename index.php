<?php session_start();?>
<?php 
if(!isset($_SESSION["login"])){
    header("Location: login.php?msg=Please login first."); die();
}
include("include/header.php");
extract($_POST);
extract($_GET);
if(!isset($answer)){
    $score=0;
    $count=0;
}
if(isset($answer)){
    $count = $lastCount;
    $score = $lastScore;
    if(is_numeric($answer)){
        if($answer == $lastResult){
            $score++;
            $count++;
        } else {
            $validation = "INCORRECT, $lastFirst $lastSign $lastSecond is $lastResult";
            $count++;
        }
    } else {
        $validation = "You must enter a number for your answer.";
    }
}
$first = rand(0,50);
$second = rand(0,50);
$operator = rand(0,1);
$result = 0;
$sign = "";
if ($operator==0){
    $result = $first + $second;
    $sign = "+";
} else {
    $result = $first - $second;
    $sign = "-";
}
?>
<div class="row">
    <form action="authenticate.php" method="post" class="form-horizontal">
        <div class="col-sm-3 col-sm-offset-9">
            <input type="hidden" id="email" name="email" value=""/>
            <input type="hidden" id="password" name="password" value=""/>
            <input type="hidden" id="logout" name="logout" value=""/>
            <button type="submit" class="btn btn-default">Logout</button>
        </div>
    </form>
    <div class="col-sm-8 col-sm-offset-4"><h1>Math Game</h1></div>
</div>
<div class="row">
    <form action="index.php" method="post" class="form-horizontal">
        <div class="col-lg-12 row">
            <div class="col-xs-2 col-sm-offset-3"><b><?php echo $first; ?></b></div>
            <div class="col-xs-3"><b><?php echo $sign; ?></b></div>
            <div class="col-xs-3"><b><?php echo $second; ?></b></div>
            <div class="col-xs-1"></div>
        </div>
        <div class="col-lg-12 row">
            <div class="col-sm-3 col-sm-offset-4">
                <input type="text" class="form-control" id="answer" name="answer" 
                placeholder="Enter answer" size="6" />
                <input type="hidden" id="lastResult" name="lastResult" value="<?php echo $result; ?>"/>
                <input type="hidden" id="lastFirst" name="lastFirst" value="<?php echo $first; ?>"/>
                <input type="hidden" id="lastSecond" name="lastSecond" value="<?php echo $second; ?>"/>
                <input type="hidden" id="lastSign" name="lastSign" value="<?php echo $sign; ?>"/>
                <input type="hidden" id="lastScore" name="lastScore" value="<?php echo $score; ?>"/>
                <input type="hidden" id="lastCount" name="lastCount" value="<?php echo $count; ?>"/>
            </div>
            <div class="col-sm-5"></div>
        </div>
        <div class="col-lg-12 row">
            <div class="col-sm-3 col-sm-offset-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-sm-5"></div>
        </div>
    </form>
    <div class="col-lg-12 row"><hr/></div>
    <div class="col-lg-12 row">
        <div class="col-sm-6 col-sm-offset-4 error"><?php echo $validation; ?></div>
        <div class="col-sm-2"></div>
    </div>
    <div class="col-lg-12 row">
        <div class="col-sm-6 col-sm-offset-4">Score: <?php echo "$score/$count"; ?></div>
        <div class="col-sm-2"></div>
    </div>
</div>