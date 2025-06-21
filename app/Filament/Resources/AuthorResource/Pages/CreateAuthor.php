<?php

namespace App\Filament\Resources\AuthorResource\Pages;

use App\Filament\Resources\AuthorResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateAuthor extends CreateRecord
{
    protected static string $resource = AuthorResource::class;

    // Tidak perlu override handleRecordCreation jika tidak pakai updateOrCreate
    // Laravel akan otomatis membuat record baru dengan data dari form
}
