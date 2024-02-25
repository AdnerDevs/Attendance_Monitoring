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
<link rel="stylesheet" href="asset/css/infiniteLoop.css">
<div class="container-fluid min-vh-100 mt-0" style="background-image: url('asset/img/bg_msa.jpg');">
    <div class="row">
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
       
    <div class="row ">
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
