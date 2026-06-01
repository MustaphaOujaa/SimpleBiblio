<?php

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

it('définit les règles de création de livre', function () {
    expect((new StoreBookRequest())->rules())
        ->toHaveKey('designation')
        ->toHaveKey('auteur')
        ->toHaveKey('prix')
        ->toHaveKey('cover');
});

it('rend la couverture optionnelle pendant la modification', function () {
    expect((new UpdateBookRequest())->rules()['cover'])
        ->toContain('nullable');
});
