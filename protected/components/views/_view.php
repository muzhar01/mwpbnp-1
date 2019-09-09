<script type="text/javascript">
    function loadData(id){
         
        var url='Product/RightPanel';

        $(document).ajaxStart(function(){
        $("#wait").css("display", "block");
        });

        $.post(url,{id:id},function(data){
           //alert(data);
            $("#collapse"+id).html(data);
           // var datanew= $("#tst"+id).html();
            // alert( document.getElementById("#tst"+id).style.display);
            if(document.getElementById("collapse"+id).style.display=='none'){
               //  alert(document.getElementById("tst"+id).style.display);
                document.getElementById("collapse"+id).style.display='block';

            }else{
                // alert(document.getElementById("tst"+id).style.display);
                document.getElementById("collapse"+id).style.display='none';
            }


        });
        $(document).ajaxComplete(function(){
    $("#wait").css("display", "none");
});
    }  

</script>

<?php
//$thickness = ProductsThicknessListings::model()->findAll("product_id=$data->id");
//$size = ProductsSizesListings::model()->findAll("product_id=$data->id");
//$total_size = count($size);
//$total_thickness = count($thickness);
?>


<div  id="heading<?php echo $data->id?>">
    <h3 class="panel-title panel-heading">
        <a role="button"  onclick="loadData('<?php echo $data->id?>');"     >
            <?php echo $data->name; ?>
        </a>
    </h3>
    
</div>
<div id="wait" style="display: none;">Wait while data Loading</div>
<div id="collapse<?php echo $data->id?>"  style="display: none;"  aria-labelledby="heading<?php echo $data->id?>">
       


        
    </div>