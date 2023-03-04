<?php

use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;

use function Pest\Laravel\postJson;

it('can logout user via api', function() {
  $email = 'test@company.com';
  $password = 'Developer123!';

  User::factory()->create(['email' => $email, 'password' => bcrypt($password)]);

  $payload = [
      'email' => $email,
      'password' => $password,
  ];

  $response = postJson('api/login', $payload);

  $accessToken = $response->decodeResponseJson()['access_token'];
  $tokenType = $response->decodeResponseJson()['token_type'];

  $response->assertStatus(200);

  $response = postJson('api/logout', [], [
    'Authorization' => "{$tokenType} {$accessToken}"
  ]);

  $response->assertStatus(200);

  expect(PersonalAccessToken::findToken($accessToken))->toBeNull();
});
