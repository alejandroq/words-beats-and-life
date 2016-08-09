<div ng-show="location == '\/content'" class="row">
	<input type="text" ng-model="searchFilter" placeholder="Search" class="five columns" list="x" value="{{title}}">
	 <datalist id="x">
          <option value="BBoying"></option>
          <option value="DJing"></option>
          <option value="Grafiti"></option>
          <option value="Knowledge of Self"></option>
          <option value="MCcing"></option>
      </datalist>
    <button ng-show="x==3" ui-sref=".add" ng-show="x > 2" class="button-primary four columns">
        <i class="fa fa-plus"></i>
        <span>Share to My Portfolio</span>
    </button>
</div>
<div id="form-background" ng-show="temp != undefined" style="left: 0"></div>
<div class="row">
<!-- ITEMS --> 
    <div ng-click="expand($index, content, null)" 
    ng-class="$index!=selected ? 'four columns block content' : $index == temp ? 'three columns block content still' : 'eight columns block content'" 
    ng-repeat="content in data | filter:searchFilter track by $index">
        <img ng-src="upload/{{content.ContentLink}}" ng-click="expand($index, content, 'grow')" alt="Alternative Text" /> 
        <h5>{{content.Title}}</h5>
        <p style="cursor: pointer;">Author: <u ng-click="viewPortfolio(content.StudentEmailAddress)">{{content.StudentEmailAddress}}</u></p>
        <p>Element: {{content.Element}}</p>
        <p>Type: {{content.ContentType}}</p>
        <div class="row" ng-show="$index==selected">
        
            <div ng-repeat="likes in likes track by $index"> 
                <div ng-show="x==5" class="four columns inner-block">

                    <div 
                        ng-show="likes.Approved > 0" 
                        ng-click="expand($index, content, 'wall')">
                        <i ng-show="likes.Featured > 0" class="fa fa-star"></i>
                        <i ng-show="likes.Featured == 0 || likes.Approved == undefined" class="fa fa-star-o"></i>
                        <br>
                        <span class="usupur">Wall</span>
                    </div>
                    <div
                        ng-show="likes.Approved == 0 || likes.Approved == undefined" 
                        ng-click="expand($index, content, 'approve')">
                        <i class="fa fa-thumbs-o-up"></i>
                        <br>
                        <span class="usupur">Approve</span>
                    </div>

                </div>

                <div
                    ng-click="expand($index, content, 'like')" 
                    class="four columns inner-block">
                    <span>{{likes.Count}}</span>
                    <i ng-show="!likes" class="fa fa-heart-o"></i>
                    <i ng-show="likes" class="fa fa-heart"></i>
                    <br>
                    <span class="usupur">Like</span>
                </div>
            </div>

        </div>
    </div>
<!-- END ITEMS -->
</div>