<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
if (!isset($_SESSION["count"])) {
    $_SESSION["count"] = 1;
}
echo $_SESSION["count"];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!--        <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />-->
        <link rel="stylesheet" href="https://bootswatch.com/4/journal/bootstrap.css" media="screen">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        <style>
            body{
                background-color: #220000;
            }
            #mc{
                //position: fixed;
                background-image: url("bg.png") !important;
                background-repeat: no-repeat;
                background-position: center;
                height: 600px;

            }
            .slotMachineNoTransition {
                transition: none !important;
            }
            .slotMachineBlurFast {
                filter: blur(5px);
            }
            .slotMachineBlurMedium {
                filter: blur(3px);
            }
            .slotMachineBlurSlow {
                filter: blur(2px);
            }
            .slotMachineBlurTurtle {
                filter: blur(1px);
            }
            .machine {
                // padding: 84px 0;
                //position: fixed;
                //width: 1100px;
                margin-left: 397px;
                margin-top: 265px;

            }
            .machine .wrap {
                margin: 0 auto;
                max-width: 1440px;
            }
            .machine .column {
                display: inline-block;

                width: 110px;
                //padding: 0 5%;
                float: left;
                height: 160px;
                border: #752D00 solid 2px;
            }

            .machine .row {
                clear: both;
            }
            .machine .optionContainer, .machine .option {
                height: 160px;
            }
            .machine .optionContainer {
                color: #811012;
                background: #FFFFFF;
                border-radius: 5px;
                margin: 0 auto 56px;
            }
            .machine .option {
                box-sizing: border-box;
                display: block;
                padding: 28px;
                text-align: center;
                font-size: 30px;
            }
            .machine .option span {
                display: inline-block;
                font-size: 80px;
                position: relative;
                top: 50%;
                transform: translateY(-50%);
            }
            .machine .mashupButton {
                //position: fixed;
                margin-top: 65px;
                margin-left: 100px;
                //padding: 28px 0 0;
                text-align: center;
            }

            .machine .mashupButton .button {
                display: inline-block;

                background-color: #7E0A0C;
                color: #FFFFFF;
                border-radius: 10px;
                width: 160px;
                border: #7E0A0C solid 1px;
                //padding: 28px 56px;
                height: 55px;
                font-size: 32px;
                box-shadow: 0 7px 16px rgba(0, 0, 0, 1);
            }
            .machine .mashupButton .button:hover {
                box-shadow: 0 4px 8px rgba(0, 0, 0, .6);
            }
            .machine .mashupButton .button:active {
                transform: translateY(4px);
            }
            #casino-chip{
                //position: fixed;
                float: right;
                right: 20px;
                top:250px;
                width: auto;
                height: 150px;
            }
            #user{
                border: #FFF solid 1px;
                height: 50px;
                width: 50px;
                padding: 5px;

                font-size: 10px;
                border-radius: 50%;
            }
            .modal-content{
                border: #B95500 solid 5px;
                border-radius: 10px;
                margin-top: 200px;
            }
            .modal-body{

                text-align: center;
                margin: 10px;
                margin: auto 0;
            }
            #success-color{
                color: #B95500;
            }
            #custome-button{
                color:#FFF !important;
                background-color: #B95500 !important;
                border: #B95500 !important;
                border-radius: 5px;
                width: 50px;
            }
            #results{
                display: none;
            }
            #spinnow{
                //position: fixed;
               
                text-align: center;
                color: #FFFFFF;
            }
            .clock {
                color: #FFF;
                margin-top: -30px;
                zoom: 0.5;
                transform: scale(.54);
                -ms-transform: scale(.54); /* IE 9 /
                -webkit-transform: scale(.54); / Safari and Chrome /
                -o-transform: scale(.54); / Opera /
                -moz-transform: scale(.54); / Firefox */
            }
            .flip-clock-wrapper {
                position: relative;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm fixed-top navbar-dark justify-content-end">
            <a class="navbar-brand" href="#">Lottery JackPot</a>
            <button class="btn btn-success ml-auto mr-1"  data-toggle="modal" data-target="#myModal" ><span id="user"><i class="fa fa-user" ></i></span> <?= $_SESSION["email"] ?></button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-0" id="navbarSupportedContent">
                <ul class="navbar-nav text-right">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"> <i class="fab fa-bitcoin"></i> <span id="balance"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="logout.php"> <i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">

                    <div class="modal-body" id="success">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <div class="msg" id="success-color">
                        </div>
                        <button class="btn" id="custome-button" data-dismiss="modal">OK</button>
                    </div>

                </div>

            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12" id="mc">
                    <div id="spinnow"><h1>SPIN NOW</h1></div>
                    <div class="machine">
                        <div class="wrap">
                            <div class="column" id="column1">
                                <div id="machine1" class="optionContainer">

                                    <span class="option">
                                        <span>1</span>
                                    </span>
                                    <span class="option">
                                        <span>2</span>
                                    </span>
                                    <span class="option">
                                        <span>3</span>
                                    </span>
                                    <span class="option">
                                        <span>4</span>
                                    </span>
                                    <span class="option">
                                        <span>5</span>
                                    </span>
                                    <span class="option">
                                        <span>6</span>
                                    </span>
                                    <span class="option">
                                        <span>7</span>
                                    </span>
                                    <span class="option">
                                        <span>8</span>
                                    </span>
                                    <span class="option">
                                        <span>9</span>
                                    </span>
                                </div>
                            </div>
                            <div class="column" id="column2">
                                <div id="machine2" class="optionContainer">
                                    <span class="option">
                                        <span>1</span>
                                    </span>
                                    <span class="option">
                                        <span>2</span>
                                    </span>
                                    <span class="option">
                                        <span>3</span>
                                    </span>
                                    <span class="option">
                                        <span>4</span>
                                    </span>
                                    <span class="option">
                                        <span>5</span>
                                    </span>
                                    <span class="option">
                                        <span>6</span>
                                    </span>
                                    <span class="option">
                                        <span>7</span>
                                    </span>
                                    <span class="option">
                                        <span>8</span>
                                    </span>
                                    <span class="option">
                                        <span>9</span>
                                    </span>
                                </div>
                            </div>
                            <div class="column" id="column3">
                                <div id="machine3" class="optionContainer">
                                    <span class="option">
                                        <span>1</span>
                                    </span>
                                    <span class="option">
                                        <span>2</span>
                                    </span>
                                    <span class="option">
                                        <span>3</span>
                                    </span>
                                    <span class="option">
                                        <span>4</span>
                                    </span>
                                    <span class="option">
                                        <span>5</span>
                                    </span>
                                    <span class="option">
                                        <span>6</span>
                                    </span>
                                    <span class="option">
                                        <span>7</span>
                                    </span>
                                    <span class="option">
                                        <span>8</span>
                                    </span>
                                    <span class="option">
                                        <span>9</span>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mashupButton">
                                    <button id="randomizeButton" class="button">Spin Now</button>
                                    <span class="clock"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div id="results">

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
        <div class="container-fluid" style="background:yellow;">
            <div class="row">
                <div class="col-lg-12">
                    <span>USE POINTS TO REDEEM FOLLOWING PRODUCT:</span>
                </div>
            </div>
            <style>
                .product{
                    margin-left: auto;
                    margin-right: auto;
                    text-align: center;
                }
            </style>
            <div class="row" >
                <div class="col-lg-4">
                    <div class="product">
                        <h1>Product 1</h1>
                        <img src="https://support.apple.com/library/content/dam/edam/applecare/images/en_US/homepod/watch-product-lockup-callout.png">
                        <span>Points Required:100</span>
                        <br/>
                        <br/>
                        <button class="btn btn-success" onclick="return redeem('product1', '100')"> REDEEM</button>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="product">
                        <h1>Product 2</h1>
                        <img src="https://support.apple.com/library/content/dam/edam/applecare/images/en_US/homepod/watch-product-lockup-callout.png">
                        <span>Points Required:200</span>
                        <br/>
                        <br/>
                        <button class="btn btn-success" onclick="return redeem('product2', '200')"> REDEEM</button>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="product">
                        <h1>Product 3</h1>
                        <img src="https://support.apple.com/library/content/dam/edam/applecare/images/en_US/homepod/watch-product-lockup-callout.png">
                        <span>Points Required:500</span>
                        <br/>
                        <br/>
                        <button class="btn btn-success" onclick="return redeem('product3', '500')"> REDEEM</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/1411288/jquery.slotmachine.min.js"></script>
        <script src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.min.js"></script>
        <link href="flipclock/css/flipclock.css" rel="stylesheet" type="text/css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
        <script src="flipclock/js/flipclock.js" type="text/javascript"></script>
        <script>
                            $(document).ready(function () {
                                setInterval(function () {
                                    $.post("balance.php", {id: '<?= $_SESSION["id"] ?>'}, function (data) {
                                        $("#balance").html(data)
                                                ;
                                    });
                                }, 1000);
                                var flags = true;
                                setInterval(function () {
                                    $.post("block.php", {id: '<?= $_SESSION["id"] ?>'}, function (data) {
                                        var json = JSON.parse(data);
                                        if (json["status"] === "0")
                                        {
                                            flags = true;
                                            removeBlock(flags);
                                        } else {
                                            if (flags)
                                            {
                                                clocks(json["diff"]);
                                                flags = false;

                                                $(".msg").html(
                                                        "<h1>THAT WAS \n A GREAT SPIN!</h1>" +
                                                        "<h3>One more try after 30 min might make \n you lucky.\n To earn more spins click below</h3>"
                                                        );
                                                $('#myModal').modal({
                                                    show: true
                                                });
                                            }

                                            $("#randomizeButton").css("display", "none");
                                        }
                                    });
                                }, 1000);

                                function removeBlock(f) {
                                    $.post("removeblock.php", {id: '<?= $_SESSION["id"] ?>'}, function (data) {
                                        var json = JSON.parse(data);
                                        if (json["status"] === "1")
                                        {
                                            $("#randomizeButton").css("display", "block");
                                            if (!f) {
                                                $(".msg").html(
                                                        "<h1>WAITING TIME IS OVER,\n A GREAT SPIN!</h1>" +
                                                        "<h3>One more try might make \n you lucky.\n To earn more spins click below</h3>"
                                                        );
                                                console.log("shown");
                                                $('#myModal').modal({
                                                    show: true
                                                });
                                            }
                                        }
                                    });
                                }
                                function clocks(t)
                                {
                                    if (t < 0)
                                    {
                                        removeBlock();
                                        return;
                                    }
                                    clock = $('.clock').FlipClock(t, {
                                        clockFace: 'MinuteCounter',
                                        countdown: true,
                                        callbacks: {
                                            stop: function () {
                                            }
                                        }
                                    });


                                }
                                var machine1 = $("#machine1").slotMachine({
                                    active: 0,
                                    delay: 500,
                                    direction: "down"
                                });
                                var machine2 = $("#machine2").slotMachine({
                                    active: 1,
                                    delay: 500,
                                    direction: "down"
                                });
                                var machine3 = $("#machine3").slotMachine({
                                    active: 2,
                                    delay: 500,
                                    direction: "down"
                                });
                                var results;
                                var flag = false;
                                function onComplete(active) {
                                    switch (this.element[0].id) {
                                        case "machine1":
                                            $("#machine1Result").text(this.active);
                                            results[0] = getMachineResult($('#machine1'), this.active);
                                            //results[0] = 1;
                                            break;
                                        case "machine2":
                                            $("#machine2Result").text(this.active);
                                            results[1] = getMachineResult($('#machine2'), this.active);
                                            //results[1] = 1;
                                            break;
                                        case "machine3":
                                            $("#machine3Result").text(this.active);
                                            results[2] = getMachineResult($('#machine3'), this.active);
                                            flag = true;
                                            //results[2] = 5;
                                            break;
                                    }
                                    $("#results").text(results.join(", "));
                                    if (flag)
                                    {
                                        $.post("result.php", {id: '<?= $_SESSION["id"] ?>', first: results[0], second: results[1], third: results[2]}, function (data) {
                                            var json = JSON.parse(data);
                                            console.log(data);
                                            if (json["point"] > 0)
                                            {
                                                $(".msg").html(
                                                        "<h1>CONGRATULATIONS!</h1>" +
                                                        "<h3 >You get " + json["point"] + " points.</h3>" +
                                                        "<h3>Use this to redeem below products.</h3>"
                                                        );
                                                $('#myModal').modal({
                                                    show: true
                                                });
                                            } else {
                                                $(".msg").html(
                                                        "<h1>THAT WAS \n A GREAT SPIN!</h1>" +
                                                        "<h3>One more try might make \n you lucky.\n To earn more spins click below</h3>"
                                                        );
                                                $('#myModal').modal({
                                                    show: true
                                                });
                                            }
                                        });
                                        flag = false;
                                        //console.log(results);
                                    }
                                }

                                function getMachineResult(i_jqMachine, i_iActive) {
                                    return i_jqMachine.find('span.option > span').eq(i_iActive + 1).text();
                                }

                                $("#randomizeButton").click(function () {
                                    results = [];
                                    $("#results").css('color', 'white').text("");
                                    machine1.shuffle(5, onComplete);
                                    setTimeout(function () {
                                        machine2.shuffle(5, onComplete);
                                        setTimeout(function () {
                                            machine3.shuffle(5, onComplete);
                                        }, 500);
                                    }, 500);
                                });
                            });
        </script>
        <script>
            function redeem(product, point)
            {
                
                $.post("redeem.php", {id: '<?= $_SESSION["id"] ?>', point: point}, function (data) {
                    var json = JSON.parse(data);
                    //console.log(data);
                    if (json["status"] === "1") {
                        $(".msg").html(
                                "<h1>YOU SUCCESSFULLY REDEEM \n " + product + "!</h1>" +
                                "<h3>Try ern more point and redeem more product</h3>"
                                );
                        $('#myModal').modal({
                            show: true
                        });

                    }

                });
            }
        </script>
    </body>
</html>
