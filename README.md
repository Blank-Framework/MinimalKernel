# MinimalKernel

MinimalKernel can be used to map HTTP request methods to the corresponding function in a controller class. All functionality needs to be handled in the controller.

##  Required packages
This component uses `symfony/http-foundation` to handle the request and response elements.

##  The controller
All controllers that you want to use with the Kernel MUST implement the `MinimalControllerInterface`. The interface contains a function for each of the
HTTP Methods. Your functions should return a `Response` class if they are implemented and EITHER null or a `Response` class that uses the `405 Method Not Allowed`
HTTP response status code. If you return null `MinimalKernel` will throw an `\Exception` thus you MUST handle that or let it throw should you choose.
