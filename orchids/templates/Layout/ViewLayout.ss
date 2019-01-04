<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<% require themedCSS(site) %>
	<% include Head %>
<body class="$ClassName">
	<% include Header %>
	<%-- include Header LogoURL='mysite/images/logo.jpg' --%>
<div class="layout">
    <div class="container content">
        <div class="row">
            <div class="col-lg-8 typography" role="main">
                <p><a href="/orchid/list" style="text-decoration: none;"><i class="fas fa-arrow-square-left" style="font-size:20px;margin:0 2px;display: inline-block;"></i> Back</a> <a href="/orchid/edit/{$Orchid.ID}" style="text-decoration: none;"><i class="fas fa-edit" style="font-size:20px;margin:0 2px 0 35px; display: inline-block;;"></i> Edit Orchid Details</a></p>
                <h1><span>Pot Number:</span> {$Orchid.PotNumber}</h1>
                <img src="assets/orchid-photos/{$Orchid.OrchidPhoto.FileName}" style="max-width:100%;" />
            </div>
            <div class="col-lg-4" role="complementary">
                <h1>Orchid Details</h1>
                <ul style="padding:0;">
                    <li><span style="display:inline-block;width:150px;font-weight:bold;">Pot Number: </span> {$Orchid.PotNumber}</li>
                    <li><span style="display:inline-block;width:150px;font-weight:bold;">Breed: </span> {$Orchid.Breed}</li>
                    <li><span style="display:inline-block;width:150px;font-weight:bold;">Type: </span> {$Orchid.Type}</li>
                    <li><span style="display:inline-block;width:150px;font-weight:bold;">Flower Colour: </span> {$Orchid.FlowerColourDisplay}</li>
                    <li><span style="display:inline-block;width:150px;font-weight:bold;">Flowering Month: </span> {$Orchid.FloweringMonthDisplay}</li>
                    <li><span style="display:inline-block;width:150px;font-weight:bold;">Notes: </span><br>{$Orchid.Notes}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
	<% include Footer %>
<script type="text/javascript" src="$ThemeDir/javascript/site.min.js"></script>
</body>
</html>