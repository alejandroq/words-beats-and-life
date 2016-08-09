myApp.controller("EventsController", function($scope, $http, $state, AuthenticationService, ExchangeService) {
	
	$scope.$parent.init('Administrator');
	var x = localStorage['x']; //Ducttape
	$scope.x = x;

	var data = [];
	var method = "add";
	
	var days = [];
	for (i=1;i<32; i++) {
		days[i-1] = i;
	}

	var months = 
	["Jan", "Feb", "Mar", "Apr", 
	"May", "Jun", "July", "Aug", 
	"Sep", "Oct", "Nov", "Dec"];

	var years = [];
	for (i=0;i<10; i++) {
		years[i] = 2016+i;
	}

	var hours = [];
	hours[0] = "12:00 AM";
	for (i=1;i<24; i++) {
		if (i < 12) {
			hours[i] = String(i).concat(":00 AM");
		} else {
			if (i == 12) {
				hours[i] = "12:00 PM"
			} else {
				hours[i] = String(i-12).concat(":00 PM");
			}
		}
	}

	//Variables
	$scope.data = {
		EventID:undefined,
		EventName:undefined,
		EventType:undefined,
		EventDescription:undefined,
		EventLocation:undefined,
		EventsDateTime:undefined,
		PrimaryContact:undefined,
		PCEmail:undefined,
		PCPhone:undefined,
		Result:undefined,
		Day:undefined,
		Month:undefined,
		Year:undefined,
		Hour:undefined,
	};

	$scope.days = days;
	$scope.months = months;
	$scope.years = years;
	$scope.hours = hours;

	data = ExchangeService.getData();
	$scope.data = data[0];
	if (data[0]!=null){
		method = "update";
	} else {
		method = "add";
	}

	$scope.firstLetterCapital = function(text) {
		return text.charAt(0).toUpperCase() + text.slice(1);
	};

	$scope.method = $scope.firstLetterCapital(method);


	// Function to submit the form after all validation has occurred            
  	$scope.submitForm = function(isValid) {
	    // check to make sure the form is completely valid
	    if (isValid) {
	      $scope.manage();
	    }
  	};

  	$scope.date = function() {
  		 
  		 if ($scope.data.Day) {
		 var day = $scope.data.Day;
		 var month = $scope.data.Month;
		 switch (month) {
		 	case "Jan": month = 1; break;
		 	case "Feb": month = 2; break;
		 	case "Mar": month = 3; break;
		 	case "Apr": month = 4; break;
		 	case "May": month = 5; break;
		 	case "Jun": month = 6; break;
		 	case "July": month = 7; break;
		 	case "Aug": month = 8; break;
		 	case "Sep": month = 9; break;
		 	case "Oct": month = 10; break;
		 	case "Nov": month = 11; break;
		 	case "Dec": month = 12; break;
		 }

		 var year = $scope.data.Year;
		 var hour = $scope.data.Hour;
		 hour = hour.substr(0, hour.length-3);

		 var datetime = year.concat("-");
		 datetime=datetime.concat(month);
		 datetime=datetime.concat("-");
		 datetime=datetime.concat(day);
		 datetime=datetime.concat(" ");
		 datetime=datetime.concat(hour);
		 return datetime;
		}
  	};

	//Functions	
	$scope.manage = function() {

		 var data = {
		 	EventID:$scope.data.EventID,
		 	EventName:$scope.data.EventName,
			EventType:$scope.data.EventType,
			EventDescription:$scope.data.EventDescription,
			EventLocation:$scope.data.EventLocation,
			EventDateTime:$scope.date(),
			PrimaryContact:$scope.data.PrimaryContact,
			PCEmail:$scope.data.PCEmail,
			PCPhone:$scope.data.PCPhone,
			Result:undefined
		 }

		if (method == "add") {
			 $http.post("../application/endpoints/addEvent.php", data)
			 .success(function(response) {
			 	$scope.data.Result = "Success!";
			 });
		} else {
			 $http.post("../application/endpoints/updateEvent.php", data)
			 .success(function(response) {
			 	$scope.data.Result = "Success!";
			 });
		}
		$scope.data.Result = "Thank you for your submission!";
		$state.reload(); //reload for new data.
	};
})