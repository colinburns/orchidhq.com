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
            <div class="col-lg-9 typography" role="main">
                <h1 class="pagetitle">$Title</h1>
				{$OrchidCreateForm}
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