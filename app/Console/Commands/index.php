<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Reservation;

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

        foreach($xml->hotel as $hotel){
            Hotel::create([
                'id' => (int) $hotel['id'],
                'name' => (string) $hotel->name
            ]);
        }

        echo "\n";

        $xml = simplexml_load_file(database_path('rooms.xml'));

        foreach($xml->room as $room):
            Room::create([
                'id' => (int) $room['id'],
                'name' => trim((string) $room),
                'hotel_id' => (int) $room['hotel_id'],
                'inventory_count' => (int) $room['inventory_count']
            ]);
        endforeach;

        echo "\n";

        $xml = simplexml_load_file(database_path('reservations.xml'));

        foreach($xml->reservation as $reservation):
            Reservation::updateOrCreate(
                ['id' => (int) $reservation->id],
                [
                    'hotel_id' => (int) $reservation->hotel_id,
                    'room_id' => (int) $reservation->room->id,
                    'customer_first_name' => (string) $reservation->customer->first_name,
                    'customer_last_name' => (string) $reservation->customer->last_name,
                    'check_in' => (string) $reservation->room->arrival_date,
                    'check_out' => (string) $reservation->room->departure_date,
                    'total_price' => (float) $reservation->room->totalprice
                ]
            );
        endforeach;

        echo "\n";

    }
}
