<?php
    ob_start(); // Start output buffering
    require_once ('header.php');
    date_default_timezone_set('Asia/Manila');
$current_time = new DateTime('now', new DateTimeZone('UTC'));
$current_time->setTimezone(new DateTimeZone('Asia/Manila'));
require_once ('Model/AnnouncementModel.php');
$announcement_model = new AnnouncementModel();
$input_value = $current_time->format('Y-m-d\TH:i');
if(isset($_SESSION["employee_id"]) && $_SESSION["employee_id"]){
?>
<style>
    .header{
    position: relative;
    letter-spacing: 3px;

    cursor: pointer;

}
#header-title{

    color: transparent;
    -webkit-text-stroke: 1px rgb(0, 0, 0, .5);

}
#hover-title{
   position: absolute;
   inset: 0;
   width: 0%;
   color: #fe21a2;
   overflow: hidden;
   border-right: 6px solid #fe21a2;
   transition: 0.5s ease-in-out;
}

.header.hover #hover-title{
    width: 50%;
    filter: drop-shadow(0 0 40px #fe21a2);
}

.flip-box{
    transform-style: preserve-3d;
    perspective: 1000px;
    cursor: pointer;
}

.flip-box-front,
.flip-box-back{
    background-size: cover;
    background-position: center;
    border-radius: 8px;
    min-height: 475px;
    transition: 0.7s cubic-bezier(.4, .2, .2, 1);
    backface-visibility: hidden;

}

.flip-box-front{
    transform: rotate(0deg);
    transform-style: preserve-3d;

}



.flip-box.hover .flip-box-front{
    transform: rotateY(-180deg);
    transform-style: preserve-3d;

}

.flip-box-back{
    position: absolute;
    top:0;
    left: 0;
    width: 100%;
    transform: rotateY(180deg);
    transform-style: preserve-3d;

    /* box-shadow: 0px 0px 5px #fb5fba,
    0px 0px 30px #fb5fba,
    0px 0px 90px #fb5fba; */
}

.flip-box-back::before{
    border-radius: 8px;
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    transform-style: preserve-3d;
    background-color: rgba(126, 116, 125, 0.5); /* Dark overlay color */
    backdrop-filter: blur(2px); /* Apply blur effect */
}

.flip-box.hover .flip-box-back{
    transform: rotateY(0deg);
    transform-style: preserve-3d;
}

.flip-box .inner{
    position: absolute;
    left: 0;
    width: 100%;

    outline: 1px solid transparent;
    perspective: inherit;
    z-index: 2;
    transform: translateY(-50%)translateZ(60px) scale(.94);
    top: 50%;

}


.media{
    font-size: default;
    transition: font-size .24s;
}

.nav-link.hover .media{
    font-size: 20px;
}

@media (max-width: 992px) {
    .header.hover #hover-title{
        width: 65%;

    }
}

@media (max-width: 937px) {
    .header.hover #hover-title{
        width: 70%;

    }
}

@media (max-width: 935px) {
    .header.hover #hover-title{
        width: 60%;

    }
}


@media (max-width: 768px) {
    .header:hover #hover-title{
        width: 80%;

    }
}
@media (max-width: 422px) {
    .header:hover #hover-title{
        width: 100%;

    }
}

</style>
<link rel="stylesheet" href="asset/css/infiniteLoop.css">
<div class="container-fluid min-vh-100 mt-0" style="background-image: url('asset/img/bg_msa.jpg');  background-size: cover;
    background-position: center; background-repeat: no-repeat; ">

    <div class="row ">
        <p class="h4 mt-2 text-center ">Announcement</p>
        <div class="scroller" data-speed="slow" data-direction="left">
            <ul class="tag-list scroller__inner p-0 d-flex gap-2 py-2 flex-wrap ">
                <?php
                    $announcement = $announcement_model->getAllAnnouncement();

                    for ( $i = 0; $i < count($announcement); $i++ ):
                        $announce = $announcement[$i];
                ?>
                <li class="scroll-li"  style="max-width: 20%;"> 
                        <div class="card" style="">
                            <div class="card-header">
                                <div class="row ">
                                    <div class="col-md-1 text-center" >
                                        <img src="asset/img/<?=$announce['announcement_image']?>" class="img-fluid" alt="" height="100" >
                                    </div>
                                    <div class="col-md-11 lh-base">
                                    <?=$announce['announcement_text']?>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                </li>
                <?php
                    endfor;
                ?>
                <!-- <li class="scroll-li">
                        <div class="card">
                            <div class="card-header">
                                <img src="asset/img/marcus.jpg" alt="" height="100">
                            </div>
                        </div>
                </li>
                <li class="scroll-li">
                        <div class="card">
                            <div class="card-header">
                                <img src="asset/img/a.jpg" alt="" height="100">
                            </div>
                        </div>
                </li>
                <li class="scroll-li">
                        <div class="card">
                            <div class="card-header">
                               Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, non ab ad voluptatibus hic laborum illum doloribus, quam tempora, itaque architecto! Aperiam maiores ducimus in rem labore quasi, obcaecati eligendi.
                            </div>
                        </div>
                </li>
               -->
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="box-item col-md-6 mb-4" id="attendna">
                <div class="flip-box">
                    <div class="flip-box-front text-center" style="background-image: url('asset/img/a.jpg');">
                        <div class="inner text-white">
                        <p class="h3 flip-box-header">Attendance</p>
                            <button type="button" id="switch" class="btn btn-primary">Start time</button>
                        </div>
                    </div>
                    <div class="flip-box-back text-center" style="background-image: url('asset/img/marcus.jpg')">
                        <div class="inner text-white">
                            <p class="h3 flip-box-header">Attendance</p>
                            <button type="button" class="btn btn-primary" id="back">End time</button>
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="https://www.facebook.com/AdnerDevs" class="nav-link " aria-current="page" >
                                        <i class="fa fa-facebook media" aria-hidden="true"></i>
                                    </a>

                                </div>
                                <div class="col-md-4">
                                    <a href="#" class="nav-link " aria-current="page" >
                                        <i class="fa fa-twitter media" aria-hidden="true"></i>
                                    </a>

                                </div>
                                <div class="col-md-4">
                                    <a href="https://github.com/A-Devss" class="nav-link " aria-current="page" >
                                        <i class="fa fa-github media" aria-hidden="true"></i>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-item col-md-6 mb-4">
                <div class="flip-box">
                    
                    <div class="flip-box-front text-center p-2" style="background-image: url('asset/img/a.jpg');">
                     <p class="h3 flip-box-header">Activity</p>
                        <div class="inner text-white p-4">
                           
                            <div class="input-group">
                                <select class="form-select" aria-label=" select example" >
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <button type="button" id="switch2" class="btn btn-primary">Start time</button>
                            </div>
                            
                        </div>
                    </div>
                    <div class="flip-box-back text-center" style="background-image: url('asset/img/marcus.jpg')">
                        <div class="inner text-white">
                            <p class="h3 flip-box-header">Activity</p>
                            <button type="button" class="btn btn-primary" id="back2">End time</button>
                            <div class="row">
                                <div class="col-md-4">
                                    <a href="https://www.facebook.com/AdnerDevs" class="nav-link " aria-current="page" >
                                        <i class="fa fa-facebook media" aria-hidden="true"></i>
                                    </a>

                                </div>
                                <div class="col-md-4">
                                    <a href="#" class="nav-link " aria-current="page" >
                                        <i class="fa fa-twitter media" aria-hidden="true"></i>
                                    </a>

                                </div>
                                <div class="col-md-4">
                                    <a href="https://github.com/A-Devss" class="nav-link " aria-current="page" >
                                        <i class="fa fa-github media" aria-hidden="true"></i>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-none">
        <div class="col-md-6 p-4">
            <p class="text-center fs-1">Attendance</p>
            
            <div class="input-group mb-3">
                <input type="datetime-local" class="form-control" value="<?=  $input_value ?>" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button type="button" class="input-group-text bg-dark text-white" id="basic-addon2">Start time</button>
            </div>
                        <div class="input-group mb-3">
                           
                            <select class="form-select" aria-label="Default select department">
                                <option value="0" selected disabled>Acivity</option>
                                <?php

                                    for ($i=0; $i<5; $i++):
                                ?>
                                <option value="">sample act</option>
                                <?php
                                    endfor;
                                ?>
                            </select>
                            <span class="input-group-text">
                                <i class="fa fa-plus-square-o" aria-hidden="true"></i>
                            </span>
                        </div>                    
            
        </div>
        <div class="col-md-6 p-4">
            <p class="text-center fs-1">Activity</p>
        </div>
    </div>
</div>

<script>
    const scrollers = document.querySelectorAll(".scroller");

if (!window.matchMedia("(prefers-redueced-motion: reduce)").matches){
    addAnimation();
}

function addAnimation() {
    scrollers.forEach((scroller) => {
        scroller.setAttribute('data-animated', true);

        const scrollerInner = scroller.querySelector('.scroller__inner');

        const scrollerContent = Array.from(scrollerInner.children);

        scrollerContent.forEach(item => {
            const duplicatedItem = item.cloneNode(true);
            duplicatedItem.setAttribute('aria-hidden', true);
            scrollerInner.appendChild(duplicatedItem);

        })
    });
}
$(document).ready(function(){
    $("#switch").click(function(){
        $('.flip-box').addClass('hover');
        $('.header').addClass('hover');
    });
    $("#back").click(function(){
        $('.flip-box').removeClass('hover');
        $('.header').removeClass('hover');
    });

    $("#switch2").click(function(){
        $('.flip-box').addClass('hover');
        $('.header').addClass('hover');
        $('#attendna').animate({
            opacity: 0
        }, 500, function() {
            $(this).hide();
        });
    });
    $("#back2").click(function(){
        $('.flip-box').removeClass('hover');
        $('.header').removeClass('hover');
        $('#attendna').animate({
            opacity: 1
        }, 500, function() {
            $(this).show();
        });
    });
});
</script>
<?php
} else {
    header("location: error.php");
    exit();
 }
?>

<?php
    require_once ('footer.php');
    ob_end_flush(); // Flush output buffer

?>
