<script>
    document.title = "WBL - Events";
</script>
<style type="text/css">
    @media only screen and (max-width: 700px), (min-device-width: 768px) and (max-device-width: 1024px)  {
      td:nth-of-type(2):before { content: "Date"; }
      td:nth-of-type(3):before { content: "Name"; }
      td:nth-of-type(4):before { content: "Type"; }
      td:nth-of-type(5):before { content: "Location"; }
    }
</style>

<div ui-view></div>

<div class="container">
    <h3>Events</h3>
    <div class="row block">
        <div ng-controller="TableController">
          <input type="text" ng-model="searchFilter" placeholder="Search" class="five columns" list="x">
          <datalist id="x">
              <option value="B-Boying"></option>
              <option value="DJing"></option>
              <option value="Grafiti"></option>
              <option value="Knowledge of Self"></option>
              <option value="MCcing"></option>
          </datalist>
          <button ui-sref=".manage" ng-show="x == 5" class="button-primary four columns">
            <i class="fa fa-plus"></i>
            <span>Add Events</span>
          </button>
            <table class="u-full-width scrollable">
                <thead>
                    <tr>
                        <td></td>
                        <td>
                            <a ng-click="sortType = 'EventDateTime'; sortReverse=!sortReverse">Date
                                <span ng-show="sortType == 'EventDateTime' && !sortReverse" class="fa fa-caret-down"></span>
                                <span ng-show="sortType == 'EventDateTime' && sortReverse" class="fa fa-caret-up"></span>
                                <span ng-hide="sortType !=null" class="fa fa-caret-down"></span>
                            </a>
                        </td>
                        <td>
                            <a ng-click="sortType = 'EventName'; sortReverse=!sortReverse">Name
                                <span ng-show="sortType == 'EventName' && !sortReverse" class="fa fa-caret-down"></span>
                                <span ng-show="sortType == 'EventName' && sortReverse" class="fa fa-caret-up"></span>
                            </a>
                        </td>
                        <td>
                            <a ng-click="sortType = 'EventType'; sortReverse=!sortReverse">Type
                                <span ng-show="sortType == 'EventType' && !sortReverse" class="fa fa-caret-down"></span>
                                <span ng-show="sortType == 'EventType' && sortReverse" class="fa fa-caret-up"></span>
                            </a>               
                        </td>
                        <td>
                            <a ng-click="sortType = 'EventLocation'; sortReverse=!sortReverse">Location
                                <span ng-show="sortType == 'EventLocation' && !sortReverse" class="fa fa-caret-down"></span>
                                <span ng-show="sortType == 'EventLocation' && sortReverse" class="fa fa-caret-up"></span>
                            </a>               
                        </td>
                        <td></td>
                        <!-- <td></td> -->
                    </tr>
                </thead>
                <tbody>
                    <tr ng-repeat="events in data | orderBy:sortType:sortReverse | filter:searchFilter">
                        <td><i class="fa fa-calendar"></i></td>
                        <td>{{events.EventDateTime}}</td>
                        <td>{{events.EventName}}</td>
                        <td>{{events.EventType}}</td>
                        <td>{{events.EventLocation}}</td>
                        <td><a ng-click="setMaster(events)" ng-show="x == 5">View Details / Update</a></td>
                        <!-- <td><a href="#/events" ng-show="x < 5">RSVP</a></td> -->
                    </tr>
                </tbody>
            </table>
        </div> 
    </div>
</div>