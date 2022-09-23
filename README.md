# How to add a new router:
1. add the url path and name of the controller into the $routes array in controller/router/index.php.
2. add your controller with the same name you specified above, into controller/routes.
3. extend from the right controller wrapper based on whether the route should be protected or not.
4. implement get and post functions.