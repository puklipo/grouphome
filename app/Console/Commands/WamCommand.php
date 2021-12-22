<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class WamCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wam {id}';

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
        //新着ページは取得できるので新着チェックくらいは可能。
        $response = Http::asForm()->post('https://www.wam.go.jp/sfkohyoout/COP000102E01.do', [
            '_FRAMEID' => 'root',
            '_TARGETID' => 'root',
            '_LUID' => '',
            '_TOKEN' => now()->timestamp,
            '_FORMID' => 'COP000102',
            '_SUBINDEX' => '',
            'vo_headVO_prefCode' => $this->argument('id'),
        ]);
        dd($response->body());

        //        Http::get('https://www.wam.go.jp/sfkohyoout/COP000100E0000.do');

        //事業者番号で直接取得はまだできない。
        //        $response = Http::asForm()->dump()->post('https://www.wam.go.jp/sfkohyoout/COP000100E12.do', [
        //            '_FRAMEID' => 'root',
        //            '_TARGETID' => 'root',
        //            '_LUID' => '',
        //            '_TOKEN' => now()->subMinute()->timestamp,
        //            '_FORMID' => 'COP000100',
        //            '_SUBINDEX' => '',
        //            'vo_headVO_adress' => '',
        //            'vo_headVO_corporation_name' => '',
        //            'vo_headVO_facility_name' => '',
        //            'vo_headVO_no' => $this->argument('id'),
        //            'vo_headVO_townCode' => '',
        //            'vo_headVO_prefCode' => '',
        //        ]);

        //dd($response->body(), now()->timestamp);

        return 0;
    }
}
