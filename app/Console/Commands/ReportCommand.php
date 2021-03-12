<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use File;
use Illuminate\Support\Facades\DB;

class ReportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:test {--desc}';

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
        $desc = ($this->option('desc') == 1) ? 'desc' : 'asc';
        $accountCount = DB::table('accounts')
        ->join('tests', 'tests.test_account_id', '=', 'accounts.account_id')
        ->select('accounts.account_username as Username', DB::raw("count(tests.test_title) as Number_of_test"))
        ->groupBy('tests.test_account_id')
        ->orderBy(DB::raw("count(tests.test_title)"), $desc)
        ->get();

        $data = "var externalDataRetrievedFromServer = " . $accountCount . ";" . "\r\n\r\n\r\n";
        $data .= "function buildTableBody(data, columns) {
            var body = [];
        
            body.push(columns);
        
            data.forEach(function(row) {
                var dataRow = [];
        
                columns.forEach(function(column) {
                    dataRow.push(row[column].toString());
                })
        
                body.push(dataRow);
            });
        
            return body;
        }
        
        function table(data, columns) {
            return {
                table: {
                    headerRows: 1,
                    body: buildTableBody(data, columns)
                }
            };
        }
        
        var dd = {
            content: [
                { text: 'Report File', style: 'header' },
                table(externalDataRetrievedFromServer, ['Username', 'Number_of_test'])
            ]
        }";
	    $fileName = time() . '_datafile.js';
	    File::put(public_path('/upload/json/'.$fileName),$data);

        
        $this->info('File Create Successfully.');
    }
}
