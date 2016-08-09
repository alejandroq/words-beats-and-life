myApp.controller("RegisterController", function($scope, $http, $state) {
	
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
	for (i=0;i<99; i++) {
		years[i] = (2016-6-i);
	}
	
	//Variables
	$scope.data = {
		EmailAddress:undefined,
		confirmEmailAddress:undefined,
		Password:undefined, 
		FirstName:undefined,
		LastName:undefined,
		Gender:undefined,
		DOB:undefined,
		CellPhone:undefined,
		UserType:undefined,
		ShirtSize:undefined,
		JoinDate:undefined,
		Result:undefined,
		Day:undefined,
		Month:undefined,
		Year:undefined
	};

	$scope.days = days;
	$scope.months = months;
	$scope.years = years;

	// Function to submit the form after all validation has occurred            
  	$scope.submitForm = function(isValid) {
	    // check to make sure the form is completely valid
	    var email = $scope.data.EmailAddress;
	    email = String(email).toLowerCase();
	    var chkEmail = $scope.data.confirmEmailAddress;
	    chkEmail = String(chkEmail).toLowerCase();
	    if (method == 'add') {
		    if (isValid && email === chkEmail) {
		      $scope.manage();
		    } else {
		    	$scope.data.Result = 'Error';
		    }
		} else {
			if (isValid) {
				$scope.manage();
			} else {
				$scope.data.Result = 'Error';
			}
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

		 var datetime = year.concat("-");
		 datetime=datetime.concat(month);
		 datetime=datetime.concat("-");
		 datetime=datetime.concat(day);
		 return datetime;
		}
  	}

	//Functions	
	$scope.manage = function() {
		 var data = {
		 	EmailAddress:$scope.data.EmailAddress,
		 	confirmEmailAddress:$scope.data.confirmEmailAddress,
			FirstName:$scope.data.FirstName,
			LastName:$scope.data.LastName,
			Gender:$scope.data.Gender,
			Password:$scope.data.Password, 
			DOB:$scope.date(),
			CellPhone:$scope.data.CellPhone,
			UserType:$scope.data.UserType,
			ShirtSize:$scope.data.ShirtSize,
			JoinDate:$scope.data.JoinDate,
			Result:undefined,
			Day:undefined,
			Month:undefined,
			Year:undefined
		 }

		$http.post("../application/endpoints/signup.php", data)
			 .success(function(response) {
			 	$scope.data.Result = "Thank you for your submission!";
			 	$state.go('home');
			 });
	};
})