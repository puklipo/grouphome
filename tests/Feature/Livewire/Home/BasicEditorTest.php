<?php

namespace Tests\Feature\Livewire\Home;

use App\Livewire\Home\BasicEditor;
use App\Models\Home;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class BasicEditorTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_update_area_and_address(): void
    {
        $this->seed();

        $home = Home::factory()->hasUsers(1)->create([
            'area' => '東京都渋谷区',
            'address' => '東京都渋谷区道玄坂1-2-3',
        ]);

        $admin = $home->users->first();

        Livewire::actingAs($admin)
            ->test(BasicEditor::class, ['home' => $home])
            ->assertSet('form.area', '東京都渋谷区')
            ->assertSet('form.address', '東京都渋谷区道玄坂1-2-3')
            ->set('form.area', '東京都新宿区')
            ->set('form.address', '東京都新宿区西新宿1-1-1')
            ->call('save')
            ->assertHasNoErrors();

        $this->assertDatabaseHas('homes', [
            'id' => $home->id,
            'area' => '東京都新宿区',
            'address' => '東京都新宿区西新宿1-1-1',
        ]);
    }
}
