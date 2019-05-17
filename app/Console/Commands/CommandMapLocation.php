<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CommandMapLocation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:map';

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
     * @return mixed
     */
    public function handle()
    {
        $this->warn("Info");
        $address = DB::table('address')->get();
        
        foreach ($address as $item)
		{
			$this->info($item->id);
			DB::table('locations')->insert([
				'id'        => $item->id,
				'name'      => $item->loc_name,
				'parent_id' => $item->loc_parent_id,
				'type'      => $item->loc_level,
			]);
		}
    }
}
