<meta name="description" content="www.mwpbnp.com is one of a Biggest Online Iron and Steel Store, in Islamabad/ Rawalpindi, Pakistan providing Quality Iron & Steel Products at the lowest prices, having more than 12 Payment Methods. Quality, Quantity, Customer Satisfaction Guranteed">
<title><?php echo $data->name; ?></title>

<link href='https://fonts.googleapis.com/css?family=Lato:400,700|Open+Sans:400,400italic,600' rel='stylesheet' type='text/css'>
<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<style>
    th, td { font-size: 11px; padding:2px; }
    .table-striped > tbody > tr:nth-child(2n+1) > td, .table-striped > tbody > tr:nth-child(2n+1) > th {
        background-color: #eaffff;
    }
</style>

<?php
$thickness = ProductsThicknessListings::model()->findAll("product_id=$data->id");
$size = ProductsSizesListings::model()->findAll("product_id=$data->id");
$total_size = count($size);
$total_thickness = count($thickness);
?>
<?php if(@$_GET['hide_title'] != 'yes') {?>
    <center><h3><?php echo '<span onclick="linktohomepage()" style="color:blue; cursor:pointer"><u>www.mwpbnp.com</u></span> Pakistan Current Prices Of ' .$data->name; ?></h3></center>
<?php } ?>
<script>
	function linktohomepage(){
		window.open('https://www.mwpbnp.com', '_blank');
	}
</script>
<?php if ($total_size > 0 && $total_thickness > 0) { ?>
    <h5>Today's Rate</h5>
    <table class="table table-condensed table-bordered table-striped">
        <tr >
            <th class="bg-gray"></th>
            <th class="bg-gray" colspan="<?php echo $total_thickness ?>">Thickness</th>
        </tr>
        <tr>
            <th class="bg-gray" style="white-space: nowrap" >Product Size</th>
            <?php foreach ($thickness as $thicknessdata) { ?>
                <th  ><?php echo stripslashes($thicknessdata->Thickness->title) ?></th>
            <?php } ?>
        </tr>
        <?php foreach ($size as $sizedata) { ?>
            <tr>
                <th class="bg-gray"><?php echo stripslashes($sizedata->size->title) ?></th>
                    <?php
                    foreach ($thickness as $thicknessdata) {
                        $price = ProductMarketPrice::model()->getTodayPrice($data->id, $sizedata->size_id, $thicknessdata->thickness_id);
                        ?>
                    <td ><?php echo $price ?></td>
                <?php } ?>
            </tr>
        <?php } ?>

    </table>

<?php } ?>

