<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class index extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:index';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $xml = simplexml_load_file(database_path('hotels.xml'));

        foreach($xml->hotel as $hotel):
            $this->info('Hotel ID: ' . $hotel['id']);
            $this->info('Nome do Hotel: ' . $hotel->name);
        endforeach;

        echo "\n";

        $xml = simplexml_load_file(database_path('rooms.xml'));

        foreach($xml->room as $room):
            $this->info('ID do Quarto: ' . $room['id']);
            $this->info('Quarto: ' . $room->name);
            $this->info('Hotel ID: ' . $room['hotel_id']);
            $this->info('Capacidade de Pessoas: ' . $room['inventory_count']);
        endforeach;

        echo "\n";

        

        $xml = simplexml_load_file(database_path('reservations.xml'));

        foreach($xml->reservation as $reservation):
            $this->info('Reserva ID: ' . $reservation->id);
            $this->info('Hotel ID: ' . $reservation->hotel_id);
            $this->info('Quarto ID: ' . $reservation->room->id);
            $this->info('Nome do Cliente: ' . $reservation->customer->first_name . ' ' . $reservation->customer->last_name);
            $this->info('Check-in: ' . $reservation->room->arrival_date);
            $this->info('Check-out: ' . $reservation->room->departure_date);
            $this->info('Preço Total: ' . $reservation->room->totalprice);

            echo "\n";

        endforeach;

        

    }
}
