
var app = angular.module('myApp', []);
app.controller('lemmikitCtrl', function ($scope, $http) {

    $scope.getData = function () {
        $http.get("lemmikit.php")
            .then(function (response) { $scope.names = response.data.lemmikit; });
    }

    $scope.getData();

    $scope.insert = function () {
        $http.post(
            "insert_data.php", {
                'nimi': $scope.nimi,
                'omistaja': $scope.omistaja,
                'rotu': $scope.rotu,
                'sukupuoli': $scope.sukupuoli,
                'syntymapaiva': $scope.syntymapaiva,
                'kuolinpaiva': $scope.kuolinpaiva
            }).then(function successCallback(response) {
                // this callback will be called asynchronously
                // when the response is available
                $scope.getData();
                $scope.feedback = "Kissan lisääminen onnistui!";

                $scope.kissanlisays.$setPristine();
                $scope.kissanlisays.$setUntouched();

              }, function errorCallback(response) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                $scope.feedback = "Kissan lisääminen epäonnistui.";
              });
    }
});
