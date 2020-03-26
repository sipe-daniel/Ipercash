app.controller('myCtrl', function($scope, $http) {
    $scope.cash = [
       {id: 1, amount : 5000, cost : 350},
       {id: 2, amount : 10000, cost : 600},
       {id: 3, amount : 15000, cost : 900},
       {id: 4, amount : 20000, cost : 1300},
       {id: 5, amount : 25000, cost : 1300},
       {id: 6, amount : 30000, cost : 1300},
       {id: 7, amount : 35000, cost : 1300},
       {id: 8, amount : 40000, cost : 1300},
       {id: 9, amount : 45000, cost : 1300},
       {id: 10, amount : 50000, cost : 1300},
       {id: 11, amount : 55000, cost : 1300},
       {id: 12, amount : 60000, cost : 1300},
       {id: 13, amount : 65000, cost : 1300},
       {id: 14, amount : 70000, cost : 2600},
       {id: 15, amount : 75000, cost : 2600},
       {id: 16, amount : 80000, cost : 2600},
       {id: 17, amount : 85000, cost : 2600},
       {id: 18, amount : 90000, cost : 2600},
       {id: 19, amount : 95000, cost : 2600},
       {id: 20, amount : 100000, cost : 2600}
    ];
    
    
    // pour changer le montant dollars en euro
    var api_key = "820b22a4d50e0be512a4a10716b7dab6"; // change with your API KEY here // get it from apilayer.net
    // init the amount to 1 (USD 1.00)
    // $scope.amount = 1;
    
    $http.get("https://apilayer.net/api/live?access_key=" + api_key + "&currencies=EUR")
    .success(function(response) {
      // get currency exchange data
      $scope.quotes = response.quotes;
      console.log(response);
      // get source currency (USD)
      $scope.sourceCurrency = "EUR";
    });
    
    });