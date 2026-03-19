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
<br>
`DB\_HOST=127.0.0.1`
<br>
`DB\_PORT=3306`
<br>
`DB\_DATABASE=hotel\_api`
<br>
`DB\_USERNAME=root`
<br>
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
<br>
`$table->unsignedBigInteger('id')->primary();`
<br>
`$table->string('name');`
<br>
`$table->timestamps();`
<br>
`});`



##### **Tabela: rooms**

`Schema::create('rooms', function (Blueprint $table) {`
<br>
`$table->unsignedBigInteger('id')->primary();`
<br>
`$table->unsignedBigInteger('hotel\_id');`
<br>
`$table->string('name');`
<br>
`$table->integer('inventory\_count');`
<br>
`$table->timestamps();`
<br>
`$table->foreign('hotel\_id')->references('id')->on('hotels')->cascadeOnDelete();`
<br>
`});`


###### **Tabela: reservations**

`Schema::create('reservations', function (Blueprint $table) {`
<br>
`$table->unsignedBigInteger('id')->primary();`
<br>
`$table->unsignedBigInteger('hotel\_id');`
<br>
`$table->unsignedBigInteger('room\_id');`
<br>
`$table->string('customer\_first\_name');`
<br>
`$table->string('customer\_last\_name');`
<br>
`$table->date('check\_in');`
<br>
`$table->date('check\_out');`
<br>
`$table->decimal('total\_price', 10, 2);`
<br>
`$table->timestamps();`
<br>
`$table->foreign('hotel\_id')->references('id')->on('hotels')->cascadeOnDelete();`
<br>
`$table->foreign('room\_id')->references('id')->on('rooms')->cascadeOnDelete();`
<br>
`});`

<hr>

##### **RELACIONAMENTOS**

* Um Hotel possui vários quartos
* Um Quarto pertence a um hotel
* Uma Reserva pertence a um hotel e a um quarto

