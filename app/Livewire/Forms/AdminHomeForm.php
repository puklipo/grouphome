<?php

namespace App\Livewire\Forms;

use App\Models\Home;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;

class AdminHomeForm extends Form
{
    /**
     * @var string 事業所番号
     */
    #[Validate('required|string|size:10|unique:homes,id')]
    public string $id = '';

    /**
     * @var string 都道府県ID
     */
    #[Validate('required|integer|numeric|between:1,47')]
    public int $pref_id;

    /**
     * @var string グループホームの名前
     */
    #[Validate('required')]
    public string $name = '';

    /**
     * @var string グループホームの名前（かな）
     */
    public ?string $name_kana = null;

    /**
     * @var string 運営法人名
     */
    #[Validate('required')]
    public string $company = '';

    /**
     * @var string グループホームの電話番号
     */
    public ?string $tel = null;

    /**
     * @var string 住所（自治体まで）
     */
    #[Validate('required')]
    public string $area = '';

    /**
     * @var string 住所（番地）
     */
    #[Validate('required')]
    public string $address = '';

    /**
     * @var string URL
     */
    public ?string $url = null;

    /**
     * @throws ValidationException
     */
    public function create(): Home
    {
        $this->validate();

        return Home::create($this->all());
    }
}
