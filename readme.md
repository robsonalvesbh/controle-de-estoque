Execute os seguintes comandos abaixo para rodar o projeto

        docker-compose up -d
        
Após iniciar o container execute

        docker exec -it gav-app bash 
        
Dentro do container execute

        compose install
  
e rode as migrations

        php artisan migrate
        
Ao executar os comando acima, o projeto estará disponível em

        http://localhost/
        