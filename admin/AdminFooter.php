<?php
if(isset($_SESSION['admin_id']) && $_SESSION["admin_id"]){

?> 
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const a = $("#toggle-btn");
            let sidebar = ("#sidebar");

            a.click(function(){
            $("#sidebar").toggleClass("expand");
        });


        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });
    </script>
    <!-- <script src="asset/js/main.js"></script> -->
</body>
</html>
<?php
}
?>