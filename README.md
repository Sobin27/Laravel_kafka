# Guia de instalação

Para fins de estudo, desenvolvi esse projeto com o intuito de aprender mais sobre sistemas de mensagerias utilizando da ferramente Kafka.

## Instalação
Para instalar o projeto, siga os passos abaixo:
```bash
git clone https://github.com/Sobin27/Laravel_kafka.git
```
Após fazer um clone do projeto, acesse a pasta do projeto e execute o comando abaixo para instalar as dependências do projeto:
```bash
composer install
```
Feito a instalação do composer, crie um arquivo .env na raiz do projeto e copie o conteúdo do arquivo .env.example para o arquivo .env.


## Configuração do Ambiente para uso

Após ter instalado todas as dependências e configurado o arquivo .env, você precisara subir o docker-compose com as configurações e necessidade do Kafka para utilização.
```bash
docker-compose up -d
```
Após subir o docker-compose com o Kafka, basta você subir o projeto com o artisan e começar a testar a funcionalidade criada:
```bash
php artisan serve
```

## Utilização
Para utilizar é muito simples, foi criado 2 comandos para criar o tópico, publicar a mensagem e consumir a mensagem.

Para criar o tópico e publicar a mensagem, basta executar o comando abaixo:
```bash
php artisan integration
```

Para consumir a mensagem, basta executar o comando abaixo:
```bash
php artisan consume
```

Com isso, você podera verificar nos Logs da aplicação um log com a mensagem que foi publicada e consumida.
````
[2025-01-28 18:00:03] local.INFO: Mensagem recebida:  
[
    {
        "name":"Sandra Veum Sr.",
        "email":"eveline.braun@example.com",
        "email_verified_at":"2025-01-28T17:59:58.000000Z",
        "updated_at":"2025-01-28T17:59:58.000000Z",
        "created_at":"2025-01-28T17:59:58.000000Z",
        "id":15
    }
] 
````
