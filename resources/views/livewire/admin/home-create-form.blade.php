<div class="w-full sm:max-w-xl mt-6 px-6 py-4 bg-white dark:bg-gray-900 shadow-md overflow-hidden sm:rounded-lg">
    <h3 class="pb-3 text-4xl">グループホームを一時的に追加</h3>

    <x-validation-errors class="mb-4"/>

    <form wire:submit="submit">
        <div>
            <x-label for="id" value="{{ __('事業所番号') }}"/>
            <x-input id="id" class="block mt-1 w-full" type="number" name="id" wire:model="form.id" required/>
        </div>

        <div>
            <x-label for="pref_id" value="{{ __('都道府県ID') }}"/>
            <x-input id="pref_id" class="block mt-1 w-full" type="number" name="pref_id" wire:model="form.pref_id" required/>
        </div>

        <div>
            <x-label for="name" value="{{ __('グループホームの名前') }}"/>
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model="form.name" required/>
        </div>

        <div>
            <x-label for="name_kana" value="{{ __('グループホームの名前（かな）') }}"/>
            <x-input id="name_kana" class="block mt-1 w-full" type="text" name="name_kana" wire:model="form.name_kana"/>
        </div>

        <div>
            <x-label for="company" value="{{ __('運営法人') }}"/>
            <x-input id="company" class="block mt-1 w-full" type="text" name="company" wire:model="form.company" required/>
        </div>

        <div>
            <x-label for="tel" value="{{ __('電話番号') }}"/>
            <x-input id="tel" class="block mt-1 w-full" type="text" name="tel" wire:model="form.tel"/>
        </div>

        <div>
            <x-label for="area" value="{{ __('住所（自治体のみ）') }}"/>
            <x-input id="area" class="block mt-1 w-full" type="text" name="area" wire:model="form.area" required/>
        </div>

        <div>
            <x-label for="address" value="{{ __('住所（番地まで全部）') }}"/>
            <x-input id="address" class="block mt-1 w-full" type="text" name="address" wire:model="form.address" required/>
        </div>

        <div>
            <x-label for="url" value="{{ __('URL') }}"/>
            <x-input id="url" class="block mt-1 w-full" type="text" name="url" wire:model="form.url"/>
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button class="ml-4">
                {{ __('登録') }}
            </x-button>
        </div>
    </form>
</div>
