<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('time_slots')->insert([
            [
                'time_slot_starts'  => '06:00:00',
                'time_slot_ends'    => '06:59:59',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'time_slot_starts'  => '07:00:00',
                'time_slot_ends'    => '07:59:59',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'time_slot_starts'  => '08:00:00',
                'time_slot_ends'    => '08:59:59',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'time_slot_starts'  => '09:00:00',
                'time_slot_ends'    => '09:59:59',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'time_slot_starts'  => '10:00:00',
                'time_slot_ends'    => '10:59:59',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'time_slot_starts'  => '11:00:00',
                'time_slot_ends'    => '11:59:59',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'time_slot_starts'  => '12:00:00',
                'time_slot_ends'    => '12:59:59',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'time_slot_starts'  => '13:00:00',
                'time_slot_ends'    => '13:59:59',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'time_slot_starts'  => '14:00:00',
                'time_slot_ends'    => '14:59:59',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'time_slot_starts'  => '15:00:00',
                'time_slot_ends'    => '15:59:59',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'time_slot_starts'  => '16:00:00',
                'time_slot_ends'    => '16:59:59',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'time_slot_starts'  => '17:00:00',
                'time_slot_ends'    => '17:59:59',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'time_slot_starts'  => '18:00:00',
                'time_slot_ends'    => '18:59:59',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'time_slot_starts'  => '19:00:00',
                'time_slot_ends'    => '19:59:59',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'time_slot_starts'  => '20:00:00',
                'time_slot_ends'    => '20:59:59',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'time_slot_starts'  => '21:00:00',
                'time_slot_ends'    => '21:59:59',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'time_slot_starts'  => '22:00:00',
                'time_slot_ends'    => '22:59:59',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'time_slot_starts'  => '23:00:00',
                'time_slot_ends'    => '23:59:59',
                'created_at'        => date('Y-m-d H:i:s'),
                'updated_at'        => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
