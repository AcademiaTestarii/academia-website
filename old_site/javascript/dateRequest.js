angular.module("cursuri",[]).controller('course', ['$http','$scope', function($http, $scope){                
                $http({
                        method : 'GET',
                        url : 'https://academiatestarii.ro/System/getCursuriApi.php?Perioada=1'
                }).success(function(res){  
                var val=res['dataCurs'];
                $scope.curs1 = val;
                }).error(function(error){
                        console.log(error);
        });
                $http({
                        method : 'GET',
                        url : 'https://academiatestarii.ro/System/getCursuriApi.php?Perioada=2'
                }).success(function(res){  
                var val=res['dataCurs'];
                $scope.curs2 = val;
                }).error(function(error){
                        console.log(error);
        });
                $http({
                        method : 'GET',
                        url : 'https://academiatestarii.ro/System/getCursuriApi.php?Perioada=3'
                }).success(function(res){  
                var val=res['dataCurs'];
                $scope.curs3 = val;
                }).error(function(error){
                        console.log(error);
        });
                $http({
                        method : 'GET',
                        url : 'https://academiatestarii.ro/System/getCursuriApi.php?Perioada=4'
                }).success(function(res){  
                var val=res['dataCurs'];
                $scope.curs4 = val;
                }).error(function(error){
                        console.log(error);
        });
                
}]);