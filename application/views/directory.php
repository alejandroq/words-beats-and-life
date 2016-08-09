<script>
	document.title = "WBL - Directory";
</script>
<style type="text/css">
	@media only screen and (max-width: 700px), (min-device-width: 768px) and (max-device-width: 1024px)  {
	  td:nth-of-type(3):before { content: "Name"; }
	  td:nth-of-type(4):before { content: "Role"; }
	  td:nth-of-type(5):before { content: "Email"; }
	}
</style>

<div ui-view></div>

<div class="container">
	<h3>Directory</h3>
	<div class="row block">
    	<div ng-controller="TableController">
          <input type="text" ng-model="searchFilter" placeholder="Search" class="five columns" list="x">
          <datalist id="x">
			     <option value="Admin"></option>
			     <option value="Cipher"></option>
	         <option value="Staff"></option>						
			     <option value="Parent"></option>
	         <option value="Student"></option>
          </datalist>
          <button ui-sref=".manage" ng-show="x == 5"  class="button-primary four columns">
          	<i class="fa fa-plus"></i>
          	<span>Add User</span>
          </button>
          <table class="u-full-width scrollable">
              <thead>
                  <tr>
                      <td></td>
                      <td>
                      	<a ng-click="sortType = 'FirstName'; sortReverse=!sortReverse">Name
                      		<span ng-show="sortType == 'FirstName' && !sortReverse" class="fa fa-caret-down"></span>
                      		<span ng-show="sortType == 'FirstName' && sortReverse" class="fa fa-caret-up"></span>
                      		<span ng-hide="sortType !=null" class="fa fa-caret-down"></span>
                      	</a>
  					         </td>
                      <td>
                      	<a ng-click="sortType = 'UserType'; sortReverse=!sortReverse">User Type
    							        <span ng-show="sortType == 'UserType' && !sortReverse" class="fa fa-caret-down"></span>
                        	<span ng-show="sortType == 'UserType' && sortReverse" class="fa fa-caret-up"></span>
                      	</a>
                       </td>
  					           <td>
                      	<a ng-click="sortType = 'EmailAddress'; sortReverse=!sortReverse">Email
  							          <span ng-show="sortType == 'EmailAddress' && !sortReverse" class="fa fa-caret-down"></span>
                      		<span ng-show="sortType == 'EmailAddress' && sortReverse" class="fa fa-caret-up"></span>
                      	</a>
                      </td>
                      <td></td>
                  </tr>
              </thead>
              <tbody>
                  <tr ng-repeat="users in data | orderBy:sortType:sortReverse | filter:searchFilter">
                      <td ng-click="viewPortfolio(users)" ng-show="users.ProfilePicture != undefined"><img ng-src="upload/{{users.ProfilePicture}}" style="width:50px; height:auto; margin:0 auto; border-radius: .2em"></td>
                      <td ng-show="users.ProfilePicture == undefined"><i class="fa fa-user"></i></td>
                      <td ng-click="viewPortfolio(users)"><a>{{users.Name}}</a></td>
                      <td>{{users.UserType}}</td>
                      <td><a href="mailto:{{users.EmailAddress}}">{{users.EmailAddress}}</a></td>
                      <td><a ng-click="setMaster(users)" ng-show="x == 5 || users.UserType != 'Applicant'">View Details / Update</a><a ng-click="approve(users)" ng-show="x == 5 || users.UserType == 'Applicant'">Approve</a></td>
                  </tr>
              </tbody>
  		  </table>
        </div>
  </div> 
</div>