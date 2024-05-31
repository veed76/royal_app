<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\CandidateTestingApi;
use Illuminate\Support\Facades\Session;

class AuthorController extends Controller
{
    public $api;
    public function __construct(CandidateTestingApi $api)
    {
        $this->api = $api;
    }
    public function getAuthors()
    {
        $responseData = $this->api->getAuthors(Session::get('auth_token'));
        if ($responseData) {
            return view('author.index')->with('authors', $responseData);
        }
    }

    public function editAuthor($id)
    {
        $responseData = $this->api->editAuthors(Session::get('auth_token'), $id);
        if ($responseData) {
            return view('author.view')->with('autherdata', $responseData);
        }
    }

    public function deleteAuthor($id)
    {
        $responseData = $this->api->editAuthors(Session::get('auth_token'), $id);
        if ($responseData && count($responseData['books']) <= 0) {
            $responseData = $this->api->deleteAuthor(Session::get('auth_token'), $id);
            if ($responseData) {
                return redirect('authors');
            } else {
                dd($responseData);
            }
        } else {
            return \Redirect::back()->withErrors(['msg' => 'The author have ' . count($responseData['books']) . ' books.']);
        }
    }
}
