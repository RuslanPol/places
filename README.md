Инсталлировать Composer  

https://getcomposer.org/download/

Для запуска приложения команда    

docker-compose up --build -d

для заполнения фейковыми данными служит команда

docker-compose exec app php artisan db:seed

примеры запросов 

[places.postman_collection.json](../places.postman_collection.json)

Примеры запросов:
GET http://localhost:8000/places

- POST http://localhost:8000/places/create
- 
- {
  "name": "New Place",
  "latitude": 55.7558,
  "longitude": 37.6173
  }
- 
- GET http://localhost:8000/users
- 
- POST http://localhost:8000/users/create



- {
  "login": "user1",
  "password": "password123"
  }


- GET http://localhost:8000/users/1/favorite-places


- POST http://localhost:8000/users/1/favorite-places
- 
- {
  "place_id": 1
  }

  
 

