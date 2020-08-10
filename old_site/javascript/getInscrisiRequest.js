var mail= 
angular.module('email',[]).controller('mail', ['$http','$scope', function($http, $scope){




$scope.update = function(){
  
                var p =$("#mailFormat").val();
                console.log(p);                
                $http({
                        method : 'GET',
                        url : 'https://academiatestarii.ro/System/getMailApi.php?Mail=' + p
                }).success(function(res){  
                //console.log(res['Locuri']-res['Inscrisi']);
                var val=res;
                console.log(res);
                if(val == "Exista"){
                    $scope.Email="Mailul acesta deja există!";
                }
                
                }).error(function(error){
                        console.log(error);
                        });
};


        }]);
 




var locuri= angular.module("locuri",[]).controller('main', ['$http','$scope', function($http, $scope){

                var p =$("#Perioada").val();
                console.log(p);
                
                $http({
                        method : 'GET',
                        url : 'https://academiatestarii.ro/System/getInscrisiApi.php?Perioada=' + p
                }).success(function(res){  
                console.log(res['Locuri']-res['Inscrisi']);
                var val=res['Locuri'];
                if(val == 0){
                    val = "Perioadă plină. Alege altă perioadă!";
                }
                    $scope.putInscrisi = val;
                }).error(function(error){
                        console.log(error);
        });

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


$scope.update = function(){
  
                    var p =$("#Perioada").val();
                console.log(p);
                
                $http({
                        method : 'GET',
                        url : 'https://academiatestarii.ro/System/getInscrisiApi.php?Perioada=' + p
                }).success(function(res){  
                console.log(res['Locuri']-res['Inscrisi']);
                var val=res['Locuri'];
                 if(val == 0){
                    val = "Perioadă plină. Alege altă perioadă!";
                }
                    $scope.putInscrisi = val;
                }).error(function(error){
                        console.log(error);
                        });
};


        }]);

angular.element(document).ready(function() {
      angular.bootstrap(document.getElementById('App2'), ['locuri']);
    });
