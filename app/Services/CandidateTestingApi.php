<?php

namespace App\Services;

class CandidateTestingApi
{
    public function login($email, $password)
    {
        $response = \Http::post(config('app.candidate_api_url') . 'token', [
            'email' => $email,
            'password' => $password,
        ]);
        if ($response->successful()) {
            return $response->json();
        } else {
            return false;
        }
    }

    public function getAuthors($token)
    {
        $response = \Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json'
        ])->get(config('app.candidate_api_url') . 'authors');
        if ($response->successful()) {
            return $response->json();
        } else {
            return false;
        }
    }

    public function editAuthors($token, $id)
    {
        $response = \Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json'
        ])->get(config('app.candidate_api_url') . 'authors/' . $id);
        if ($response->successful()) {
            return $response->json();
        } else {
            return false;
        }
    }

    public function deleteAuthor($token, $id)
    {
        $response = \Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json'
        ])->delete(config('app.candidate_api_url') . 'authors/' . $id);

        if ($response->successful()) {
            return true;
        } else {
            return false;
        }
    }
    public function createAuthor($token, $data)
    {
        $response = \Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json'
        ])->post(config('app.candidate_api_url') . 'authors', $data);
        if ($response->successful()) {
            return $response->json();
        } else if ($response->failed()) {
            return $response->body();
        } else {
            return false;
        }
    }


    public function getBooks($token)
    {
        $response = \Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json'
        ])->get(config('app.candidate_api_url') . 'books');

        if ($response->successful()) {
            return $response->json();
        } else {
            return false;
        }
    }

    public function editBook($token, $id)
    {

        $response = \Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json'
        ])->get(config('app.candidate_api_url') . 'books/' . $id);

        if ($response->successful()) {
            return $response->json();
        } else {
            return false;
        }
    }

    public function storeBook($token, $data)
    {
        $response = \Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $token,
        ])->post(config('app.candidate_api_url') . 'books', $data);
        if ($response->successful()) {
            return ['message' => $response->json(), 'status' => $response->status()];
        } else if ($response->failed()) {
            return ['message' => $response->body(), 'status' => $response->status()];
        } else {
            return false;
        }
    }


    public function deleteBook($token, $id)
    {
        $response = \Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json'
        ])->delete(config('app.candidate_api_url') . 'books/' . $id);

        if ($response->successful()) {
            return true;
        } else {
            return false;
        }
    }

    public function profile($token, $id)
    {
        $response = \Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Content-Type' => 'application/json'
        ])->get(config('app.candidate_api_url') . 'users/' . $id);
        if ($response->successful()) {
            return $response->json();
        } else {
            return false;
        }
    }
}
