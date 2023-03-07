<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CutiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testRequiredAnnualLeaves(){
        $this->json('POST', 'api/annual-leaves', ['Accept' => 'application/json'])
            ->assertStatus(400)
            ->assertJson([
                "status" => "fail",
                "message" => [
                    "The id user field is required.",
                    "The tanggal field is required.",
                    "The jumlah hari field is required.",
                    "The alasan field is required.",
                    "The ket field is required.",
                ]
            ]);
    }

    public function testRepeatInsertAnnualLeaves(){
        $userData = [
            "id_user" => "1",
            "tanggal" => "2022-01-02",
            "jumlah_hari" => "2",
            "alasan" => "aaa",
            "status" => "Y",
            "ket" => "0",
        ];

        $this->json('POST', 'api/annual-leaves', $userData, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status" => "success",
                "message" => "success store data",
            ]);
    }

    public function testGetAnnualLeaves(){
        $this->json('GET', 'api/annual-leaves')
            ->assertStatus(200)
            ->assertJson([
                "status" => "success",
                "message" => "success get data",
            ]);
    }

    public function testFindAnnualLeaves(){
        $this->json('GET', 'api/annual-leaves/1')
            ->assertStatus(200)
            ->assertJson([
                "status" => "success",
                "message" => "success get data",
            ]);
    }

    public function testErrorFindAnnualLeaves(){
        $this->json('GET', 'api/annual-leaves/102')
            ->assertStatus(404)
            ->assertJson([
                "status" => "success",
                "message" => "data not found",
            ]);
    }
}
