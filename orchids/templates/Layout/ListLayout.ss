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
            <div class="col-lg-12 typography" role="main">
                <table id="OrchidTable" class="table table-striped table-bordered" style="width: 100%;" role="grid" aria-describedby="OrchidTable_info">
                    <thead>
                        <tr role="row">
                            <th>Thumbnail</th>
                            <th>Pot Number</th>
                            <th>Breed</th>
                            <th>Type</th>
                            <th>Common Name</th>
                            <th>Flower Colour</th>
                            <th>Flowering Month</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
				<% loop $Orchids %>
                        <tr role="row" class="$EvenOdd">
                            <td style="text-align:center;">
                                <a href="/orchid/view/{$ID}">
                                    <img src="assets/orchid-photos/{$OrchidPhoto.FileName}" style="max-height:100px;" />
                                </a>
                            </td>
                            <td>$PotNumber</td>
                            <td>$Breed</td>
                            <td>$Type</td>
                            <td>$CommonName</td>
                            <td>$FlowerColour</td>
                            <td>$FloweringMonth</td>
                            <td style="text-align:center;">
                                <a href="/orchid/view/{$ID}"><i class="fas fa-file-image" style="font-size:20px;margin:0 2px;"></i></a>
                                <a href="/orchid/edit/{$ID}"><i class="fas fa-edit" style="font-size:20px;margin:0 2px;"></i></a>
                                <a href="/orchid/delete/{$ID}" class="delete"><i class="fas fa-trash" style="font-size:20px;margin:0 2px;"></i></a>
                            </td>
                        </tr>
                <% end_loop %>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-3" role="complementary">
				<% include SideBar %>
            </div>
        </div>
    </div>
</div>
	<% include Footer %>
<script type="text/javascript" src="$ThemeDir/javascript/site.min.js"></script>
</body>
</html>