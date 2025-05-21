<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\BillStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bill;

use MoonShine\Laravel\Fields\Relationships\HasOne;
use MoonShine\Laravel\Http\Responses\MoonShineJsonResponse;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Support\DTOs\Select\Option;
use MoonShine\Support\DTOs\Select\Options;
use MoonShine\Support\Enums\SortDirection;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\File;
use MoonShine\UI\Fields\ID;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Text;


/**
 * @extends ModelResource<Bill>
 */
class BillResource extends ModelResource
{
    protected string $model = Bill::class;

    protected string $title = 'Счета';

    protected SortDirection $sortDirection = SortDirection::ASC;

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Название', 'name'),
            Text::make('Номер счета', 'bill_number'),
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
                    BillStatus::query()
                        ->get()
                        ->mapWithKeys(fn (BillStatus $billStatus) => [
                            $billStatus->id => $billStatus->name
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
                Text::make('Номер счета', 'bill_number'),
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
                        BillStatus::query()
                            ->get()
                            ->mapWithKeys(fn (BillStatus $billStatus) => [
                                $billStatus->id => $billStatus->name
                            ])
                            ->toArray()
                    ),
                File::make('Счет', 'filepath')
            ])
        ];
    }

    private function getLabelOptionStatus()
    {

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
     * @param Bill $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
