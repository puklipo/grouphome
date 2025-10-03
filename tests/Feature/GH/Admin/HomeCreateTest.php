<?php

namespace Tests\Feature\GH\Admin;

use App\Livewire\Admin\HomeCreateForm;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class HomeCreateTest extends TestCase
{
    use RefreshDatabase;

    public function test_example(): void
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(HomeCreateForm::class)
            ->assertOk();
    }

    public function test_unauth(): void
    {
        $this->get(route('admin.home-create'))
            ->assertRedirect();
    }

    public function test_create(): void
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(HomeCreateForm::class)
            ->set('form.id', 1111111111)
            ->set('form.pref_id', 1)
            ->set('form.name', 'test')
            ->set('form.name_kana', 'test')
            ->set('form.company', 'test')
            ->set('form.tel', '111')
            ->set('form.area', 'aaa')
            ->set('form.address', 'bbb')
            ->call('submit')
            ->assertRedirect();

        $this->assertDatabaseHas('homes', [
            'id' => 1111111111,
        ]);
    }

    public function test_create_error(): void
    {
        $user = User::factory()->create();

        Livewire::actingAs($user)
            ->test(HomeCreateForm::class)
            ->call('submit')
            ->assertHasErrors('form.id');
    }
}
