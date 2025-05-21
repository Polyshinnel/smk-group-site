<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\BillStatus;
use App\Models\ResearchStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Research;

use MoonShine\Laravel\Fields\Relationships\HasMany;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\Enums\SortDirection;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\File;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Text;

/**
 * @extends ModelResource<Research>
 */
class ResearchResource extends ModelResource
{
    protected string $model = Research::class;

    protected string $title = 'Исследования';
    protected SortDirection $sortDirection = SortDirection::ASC;

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
            Select::make('Статус', 'status_id')
                ->options(
                    ResearchStatus::query()
                        ->get()
                        ->mapWithKeys(fn (ResearchStatus $researchStatus) => [
                            $researchStatus->id => $researchStatus->name
                        ])
                        ->toArray()
                )
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
                Select::make('Статус', 'status_id')
                    ->options(
                        ResearchStatus::query()
                            ->get()
                            ->mapWithKeys(fn (ResearchStatus $researchStatus) => [
                                $researchStatus->id => $researchStatus->name
                            ])
                            ->toArray()
                    ),
                HasMany::make('Результаты исследования', 'results', resource: ResearchResultResource::class)
                    ->fields([
                        ID::make('ID', 'id'),
                        Text::make('Название', 'name'),
                        File::make('Файл', 'filepath')
                    ])->creatable()
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
     * @param Research $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
