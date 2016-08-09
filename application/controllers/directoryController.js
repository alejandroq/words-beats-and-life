myApp.controller("DirectoryController", function($scope, $http, $state, AuthenticationService, ExchangeService) {
	
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
	for (i=0;i<99; i++) {
		years[i] = (2016-6-i);
	}
	
	//Variables
	$scope.data = {
		EmailAddress:undefined,
		confirmEmailAddress:undefined,
		Password:undefined, 
		InputPassword:undefined,
		NewPassword:undefined,
		FirstName:undefined,
		LastName:undefined,
		Gender:undefined,
		DOB:undefined,
		CellPhone:undefined,
		UserType:undefined,
		ShirtSize:undefined,
		JoinDate:undefined,
		ManagerEmail:undefined,
		AdminTitle:undefined,
		AdminEmailAddress:undefined, 
		StaffType:undefined,
		Result:undefined,
		Day:undefined,
		Month:undefined,
		Year:undefined
	};

	$scope.days = days;
	$scope.months = months;
	$scope.years = years;

	// $scope.parseDate = function() {
 //  		var datetime = $scope.data.DOB;
 //  		var year = String(datetime).substr(0,4);
 //  		var month = String(datetime).substr(5,2);
 //  		month = String(month);
 //  		var day = String(datetime).substr(8,2);
 //  		day = String(day);
  		
 //  		if (day.substr(0,0)==='0') {
 //  			$scope.data.Day = day;
 //  		} else {
 //  			$scope.data.Day = day.substr(0,1);
 //  		}
 //  		if (month.substr(0,0)==='0') {
 //  			$scope.data.Month = month;
 //  		} else {
 //  			$scope.data.Month = month.substr(0,1);
 //  		}
 //  		$scope.data.Year = year;
 //  	}

	data = ExchangeService.getData();
	$scope.data = data[0];
	if (data[0]!=null){
		method = "update";
	} else {
		method = "add";
	}
	// if (method == 'update') {
	// 	$scope.parseDate();
	// }

	$scope.firstLetterCapital = function(text) {
		return text.charAt(0).toUpperCase() + text.slice(1);
	};

	$scope.method = $scope.firstLetterCapital(method);

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

  	$scope.passwordCheck = function() {
  		var oldPW = $scope.data.Password;
  		var inptPw = $scope.data.InputPassword;
  		var newPw = $scope.data.NewPassword;

  		if (method == "update") {
  			if (inptPw === $scope.data.Password) {
  				return newPw;
  			} else {
  				return oldPW;
  			}
  		} else {
  			return inptPw;
  		}
  	}

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
			Password:$scope.passwordCheck(), 
			NewPassword:$scope.data.NewPassword,
			DOB:$scope.date(),
			CellPhone:$scope.data.CellPhone,
			UserType:$scope.data.UserType,
			ShirtSize:$scope.data.ShirtSize,
			JoinDate:$scope.data.JoinDate,
			AdminEmailAddress:$scope.data.AdminEmailAddress,
			ManagerEmail:$scope.data.ManagerEmail,
			AdminTitle:$scope.data.AdminTitle,
			StaffType:$scope.data.StaffType,
			Result:undefined,
			Day:undefined,
			Month:undefined,
			Year:undefined
		 }

		if (method == "add") {
			 $http.post("../application/endpoints/addUser.php", data)
			 .success(function(response) {
			 	$scope.data.Result = "Success!";
			 });
		} else {
			 $http.post("../application/endpoints/updateUser.php", data)
			 .success(function(response) {
			 	$scope.data.Result = response;
			 });
		}
		$scope.data.Result = "Thank you for your submission!";
		$state.reload(); //reload for new data.
	};
})