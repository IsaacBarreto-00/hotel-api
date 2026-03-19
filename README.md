# **HotelAPI**

Esse projeto se baseia no desenvolvimento de uma aplicação API para o gerenciamento de hotéis, quartos e reservas, utilizando o PHP como principal linguagem e o framework Laravel. O projeto foi estruturado e organizado visando a manipulação de dados atrelados à disponibilidade de quartos de hotel e a simulação de registro de reservas.

Um arquivo XML é fornecido com dados inicias, onde o principal objetivo é fazer com que esses dados sejam lidos, salvos e repassados ao banco de dados.

### **Tecnologias Utilizadas**

* PHP 8.x
* Laravel
* MySQL
* XML

<hr>

### **Instalar dependências**

`composer install`

<hr>

### **Configuração do `.env`**

`DB\_CONNECTION=mysql`
`DB\_HOST=127.0.0.1`
`DB\_PORT=3306`
`DB\_DATABASE=hotel\_api`
`DB\_USERNAME=root`
`DB\_PASSWORD=`

#### **Rodar Migrations**

`php artisan migrate`

##### **Rodar o Servidor**

`php artisan serve`

#### **Importação de Dados(XML)**

Os arquivos XML estão localizadas na pasta:

`database/`

Para que os dados sejam importados e lidos:

`php artisan app:index`

Esse comando lê os arquivos XML e processa os dados, onde desde que o CRUD não seja utilizado, no próprio terminal as informações são exibidas. Do contrário os dados são salvos no banco de dados e exibidos no navegador, desde que o arquivo routes esteja de acordo.

##### **Estrutura do Banco de Dados(MySQL)**

##### **Tabela: hotel**

`Schema::create('hotels', function (Blueprint $table) {`
`$table->unsignedBigInteger('id')->primary();`
`$table->string('name');`
`$table->timestamps();`
`});`



##### **Tabela: rooms**

`Schema::create('rooms', function (Blueprint $table) {`
`$table->unsignedBigInteger('id')->primary();`
`$table->unsignedBigInteger('hotel\_id');`
`$table->string('name');`
`$table->integer('inventory\_count');`
`$table->timestamps();`
`$table->foreign('hotel\_id')->references('id')->on('hotels')->cascadeOnDelete();`
`});`


###### **Tabela: reservations**

`Schema::create('reservations', function (Blueprint $table) {`
`$table->unsignedBigInteger('id')->primary();`
`$table->unsignedBigInteger('hotel\_id');`
`$table->unsignedBigInteger('room\_id');`
`$table->string('customer\_first\_name');`
`$table->string('customer\_last\_name');`
`$table->date('check\_in');`
`$table->date('check\_out');`
`$table->decimal('total\_price', 10, 2);`
`$table->timestamps();`
`$table->foreign('hotel\_id')->references('id')->on('hotels')->cascadeOnDelete();
`$table->foreign('room\_id')->references('id')->on('rooms')->cascadeOnDelete();`
});`

<hr>

##### **RELACIONAMENTOS**

* Um Hotel possui vários quartos
* Um Quarto pertence a um hotel
* Uma Reserva pertence a um hotel e a um quarto

