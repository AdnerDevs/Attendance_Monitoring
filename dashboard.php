<?php
    require_once ('header.php');
?>
<link rel="stylesheet" href="asset/css/infiniteLoop.css">
<div class="container-fluid ">
        <p class="h4 mt-4 text-center">Announcement</p>
        <div class="scroller" data-speed="slow" data-direction="left">
            <ul class="tag-list scroller__inner p-0 d-flex gap-2 py-2 flex-wrap ">
                
                <?php #for ($i = 0; $i<6; $i++): ?>
                    <li class="scroll-li">announcemen info</li>
                <?php #endfor; ?>

                <li class="scroll-li">
                        <div class="card">
                            <div class="card-header">
                                <img src="asset/img/logo.jpg" alt="" height="100">
                            </div>
                        </div>
                </li>
                <li class="scroll-li">
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
              
            </ul>
        </div>
    <div class="row min-vh-100 bg-light">
        <div class="col-md-6 bg-primary"></div>
        <div class="col-md-6 bg-warning">

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
    require_once ('footer.php');
?>
