<?php

use App\Models\User;

use function Pest\Laravel\postJson;

it('can login user and receive token via api', function() {
    $email = 'test@company.com';
    $password = 'Developer123!';

    User::factory()->create(['email' => $email, 'password' => bcrypt($password)]);

    $payload = [
        'email' => $email,
        'password' => $password,
    ];

    $response = postJson('api/login', $payload);

    $response
        ->assertStatus(200)
        ->assertJsonStructure(["access_token", "token_type"]);
});

it('cannot login user with wrong password via api', function() {
    $email = 'test@company.com';
    $password = 'Developer123!';

    User::factory()->create(['email' => $email, 'password' => bcrypt($password)]);

    $payload = [
        'email' => $email,
        'password' => 'test',
    ];

    $response = postJson('api/login', $payload);

    $response->assertStatus(401);
});
