var estoqueApp = angular.module('estoqueApp', [], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('[[');
    $interpolateProvider.endSymbol(']]');
});

estoqueApp.controller('produtoController', function ($scope, $http) {

    $scope.createProduct = function (form) {

        form.find('input').each(function (idx, input) {
            console.log($(input).val());
        });

        $http({
            url: form.getAttribute('action'),
            method: "POST",
            data: JSON.stringify(data)
        })
            .then(function (response) {
                    // success
                },
                function (response) { // optional
                    // failed
                });

        $http
            .post()
            .then(function (response) {
                $scope.myWelcome = response.data;
            });
        console.log();

        return false;
    };

});