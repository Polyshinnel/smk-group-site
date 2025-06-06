<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\BillStatus;
use App\Models\Research;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\ClosedDocuments;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\File;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<ClosedDocuments>
 */
class ClosedDocumentsResource extends ModelResource
{
    protected string $model = ClosedDocuments::class;

    protected string $title = 'ClosedDocuments';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Название', 'name'),
            Select::make('Пользователь', 'user_id')
                ->options(
                    User::query()
                        ->get()
                        ->mapWithKeys(fn (User $user) => [
                            $user->id => $user->name . ' (' . $user->organization . ')'
                        ])
                        ->toArray()
                ),
            Select::make('Исследование', 'research_id')
                ->options(
                    Research::query()
                        ->get()
                        ->mapWithKeys(fn (Research $research) => [
                            $research->id => $research->name
                        ])
                        ->toArray()
                ),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Text::make('Название', 'name'),
                Select::make('Пользователь', 'user_id')
                    ->options(
                        User::query()
                            ->get()
                            ->mapWithKeys(fn (User $user) => [
                                $user->id => $user->name . ' (' . $user->organization . ')'
                            ])
                            ->toArray()
                    ),

                Select::make('Исследование', 'research_id')
                    ->options(
                        Research::query()
                            ->get()
                            ->mapWithKeys(fn (Research $research) => [
                                $research->id => $research->name
                            ])
                            ->toArray()
                    ),
                File::make('Документ', 'filepath'),
            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
        ];
    }

    /**
     * @param ClosedDocuments $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
