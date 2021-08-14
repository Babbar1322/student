<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Employee;


class fetchData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'fetch the data from employess api and inset into employee table in mysql db';

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
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, 'http://dummy.restapiexample.com/api/v1/employees'); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
         $data = curl_exec($ch); 
         curl_close ($ch);
         $dat= json_decode($data,true);
         $count = count($dat['data']);
         $emp = $dat['data'];
         for($i=0;$i<$count;$i++){
             if(!empty($emp[$i]['profile_image'])){
                 Stroage::disk('local')->put('public/'.$emp[$i]['profile_image']);
             }
             Employee::create([
                 'name'=> $emp[$i]['employee_name'],
                 'salary'=>$emp[$i]['employee_salary'],
                 'age'=> $emp[$i]['employee_age'],
                 'profile_picture'=> $emp[$i]['profile_image']
             ]);
         }
    }
}
