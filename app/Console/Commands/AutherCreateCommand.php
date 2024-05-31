<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use App\Services\CandidateTestingApi;

class AutherCreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auther:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create new auther';

    /**
     * Execute the console command.
     */
    public $api;
    public function __construct(CandidateTestingApi $api)
    {
        parent::__construct();
        $this->api = $api;
    }


    public function handle()
    {
        $responseData = $this->api->login("ahsoka.tano@royal-apps.io", "Kryze4President");
        if ($responseData) {
            $fname = $this->ask('Enter author first_name?');
            $lname = $this->ask('Enter author last_name?');
            $birthday = $this->ask('Enter author birthday?');
            $biography = $this->ask('Enter author biography?');
            $gender = $this->ask('Enter author gender?');
            $placeofb = $this->ask('Enter author place of birth?');
            if (is_null($fname) || is_null($birthday)) {
                return $this->error('Name or birthday cannot be null.');
            }
            $token = $responseData['token_key'];
            $data = [
                "first_name" => (string)$fname,
                "last_name" => (string)$lname,
                "birthday" => (string) date("c", strtotime($birthday)),
                "biography" => (string)$biography,
                "gender" => (string)$gender,
                "place_of_birth" => (string)$placeofb,
            ];

            $response = $this->api->createAuthor($token,  $data);

            dd($response);
        }
    }
}
