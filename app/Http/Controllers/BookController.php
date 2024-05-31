<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\CandidateTestingApi;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{

    public $api;
    public function __construct(CandidateTestingApi $api)
    {
        $this->api = $api;
    }

    public function getBooks()
    {
        $responseData = $this->api->getBooks(Session::get('auth_token'));
        if ($responseData) {
            return view('books.index')->with('books', $responseData);
        }
    }

    public function editBook($id)
    {
        $responseData = $this->api->editBook(Session::get('auth_token'), $id);
        if ($responseData) {
            $autherId = $responseData['author']['id'];

            $response = $this->api->editAuthors(Session::get('auth_token'), $autherId);
            if ($response) {
                $auther_name = $response['first_name'] . ' ' . $response['last_name'];
            }
            return view('books.view', ['bookdata' => $responseData, 'auther_name' => $auther_name]);
        }
    }

    public function deleteBook($id)
    {
        $response = $this->api->deleteBook(Session::get('auth_token'), $id);
        if ($response) {
            return redirect()->back();
        }
    }

    public function create()
    {
        $responseData = $this->api->getAuthors(Session::get('auth_token'));
        if ($responseData) {
            return view('books.create')->with('authors', $responseData);
        }
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $request->validate([
            'author' => 'required',
            'title' => 'required',
            'release_date' => 'required',
            'description' => 'required',
            'isbn' => 'required',
            'format' => 'required',
            'number_of_pages' => 'required',
        ]);

        $dateTime = isset($input['release_date']) ? Carbon::createFromFormat('Y-m-d\TH:i', $input['release_date']) : NULL;
        $data = [
            "author" => [
                "id" => $input['author']
            ],
            "title" => $input['title'],
            "release_date" => $dateTime->toAtomString(),
            "description" => $input['description'],
            "isbn" => $input['isbn'],
            "format" => $input['format'],
            "number_of_pages" => (int) $input['number_of_pages'],
        ];
        $response = $this->api->storeBook(Session::get('auth_token'), $data);


        if ($response['status'] != 200) {
            return response()->json($response, $response['status']);
        }

        if ($response['status'] = 200) {
            return redirect('books');
        }
    }
}
