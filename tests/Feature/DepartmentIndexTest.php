<?php

use App\Models\Department;
use App\Models\User;

it('shows the department index page', function () {
    $user = User::factory()->create();

    Department::factory()->create([
        'name' => 'Engineering',
        'code' => 'ENG',
        'description' => 'Product engineering team',
    ]);

    $response = $this->actingAs($user)->get('/departments');

    $response->assertOk();
    $response->assertSee('Department directory');
    $response->assertSee('Engineering');
});
