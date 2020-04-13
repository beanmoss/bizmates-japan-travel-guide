# Bizmates Japan Travel Guide

### Requirements
 -  PHP 7.2.x
 -  NodeJS 8.x
 -  Composer
 -  NPM
 -  These 3
  OWM_KEY (Open Weather Map)
  FOUR_SQUARE_CLIENT_ID
  FOUR_SQUARE_CLIENT_SECRET

### How to run this app
1. Clone this repo
2. Run ```composer install``` on the root dir
3. Rename ```.env.example``` to ```.env``` and provide values for the ff:
```
OWM_KEY
FOUR_SQUARE_CLIENT_ID
FOUR_SQUARE_CLIENT_SECRET
  ```
4. Run ```php -S localhost:8080 -t public``` to boot up the backend server

5. Change dir to ```client``` folder and run ```npm install```
6. On that same dir, run ```npm start``` to start the client app.
7. Open the url shown on a browser.

### Why is this special?

1. Though it lacks better aesthetics, I see to it that I provided better UX like auto city suggestion when a missing location is entered. Proper loading indicator is added to inform the user that it is doing something on the background.

2. Under the hood, this app is using VueJS framework as the client(frontend) app and Lumen Framework for the minimal Backend api service. 
  - VueJS helped me with its component management better (Separation of concerns) rather than having all elements in one huge file. 
  - Awesome View/Model implementation (Framework feature).

  - On the backend, Lumen microframework is a beast as a backend service api for small-medium apps like this. Made use of handful framework/language features like IOC, Caching, Container, Service Providers, Interfaces and Typehinting etc..

### TODO:

1. I regret not having unit tests due to time constraints.