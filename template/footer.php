
</div>
</section>




<script src="<?php echo $url; ?>assets/vendor/jQuery/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" ></script>
<script src="<?php echo $url; ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo $url; ?>assets/vendor/wayPoint/lib/jquery.waypoints.js"></script>
<script src="<?php echo $url; ?>assets/vendor/counter-up/jquery.counterup.js"></script>
<script src="<?php echo $url; ?>assets/vendor/dataTable/jquery.dataTables.min.js"></script>
<script src="<?php echo $url; ?>assets/vendor/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<!--<script src="--><?php //echo $url; ?><!--assets/vendor/Chart/chart.min.js"></script>-->
<script src="<?php echo $url; ?>assets/js/app.js"></script>


<script>


    let currentPage = location.href ;


    $(".menu-item-link").each(
        function (){
            let links = $(this).attr("href");

            if(currentPage ===  links){
               $(this).parent(".menu-item").addClass("Active");
            }
        }

    );






</script>

</body>
</html>