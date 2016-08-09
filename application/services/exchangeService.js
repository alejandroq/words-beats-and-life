myApp.service('ExchangeService', function() {
	var data = [];

	var addData = function(newObj) {
		data = [];
		data.push(newObj);
	};

	var getData = function() {
		var temp = data;
		data = [];
		return temp;
	};

	return {
		addData: addData,
		getData: getData
	};
});