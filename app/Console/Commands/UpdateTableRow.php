<?php

namespace App\Console\Commands;

use App\Models\Produk;
use App\Models\User;
use App\Models\pesanan_users;
use App\Models\transaksi_manuals;

use Illuminate\Console\Command;

class UpdateTableRow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $rows = pesanan_users::where('status_pesanan', 'belum_ditinjau')
        ->where('created_at', '<=', now()->subMinutes(5))
        ->get();
    
    foreach ($rows as $row) {
        // Update the row here
        $row->status_pesanan = 'transaksi_batal';
        $row->save();
    }
    }
}
