(function(angular){

	var bkap = angular.module('bkap',[]);
	bkap.controller('BkapBackend',function($http,$scope){

		$http.get(_api+'/json-data').then(function(res){
			$scope.jsons = res.data;
		});

		/**
		* Lấy link hiện tại và cắt nỏ băng split;
		* Lấy phần tử cuối cùng là id của route hiện tại
		* CHức năng này sử dụng để laod json dât các route permission của route còn lại sau khi gán
		*/
		
		var link = location.href;
		l = link.split('/');
		i = l.length - 1;
		$http.get(_url+'/role-edit/'+l[i]+'/?json=1').then(function(res){
			$scope.permissions = res.data;
		});


		// $scope.get_note_daily = (student, id) => {
		// 	alert(student);
		// }
	});
	
})(angular);