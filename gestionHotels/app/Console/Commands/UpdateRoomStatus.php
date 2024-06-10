<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reservation;
use App\Models\Chambre;
use Carbon\Carbon;

class UpdateRoomStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oomstatus:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update room status based on reservations departure date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reservations = Reservation::where('dateDepart', '<', Carbon::now())->get();

        foreach ($reservations as $reservation) {
            $room = Chambre::find($reservation->id);
            if ($room && $room->status == 0) {
                $room->status = 1;
                $room->save();
            }
        }

        $this->info('Room statuses updated successfully.');
    
    $rooms = Chambre::all();

    foreach ($rooms as $room) {
        $room->updateStatusBasedOnReservations();
    }

    $this->info('Room statuses updated successfully.');
}
}
