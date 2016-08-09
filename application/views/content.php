<script type="text/javascript">
	document.title="WBL - Content";
</script>
<div ui-view></div>
<div class="container">
    <div class="row">
    	<h3>Content</h3>
    	<img ng-src="upload/{{content.ProfilePicture}}" style="width:75px; height:auto; margin:0 auto; border-radius: .2em">
    	<h4>{{subject}}</h4>
    </div>
    <div class="ui-full-width" ng-include="'../application/views/contentItems.php'">
    </div> 
</div>