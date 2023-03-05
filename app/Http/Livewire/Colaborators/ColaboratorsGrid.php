<?php

namespace App\Http\Livewire\Colaborators;

use App\Models\Colaborator;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class ColaboratorsGrid extends PowerGridComponent
{
    use ActionButton;

    public string $sortField = 'surname';
    
    public string $sortDirection = 'asc';

    public int $perPage = 999;

    protected $listeners = [
        'refresh-grid' => '$refresh'
    ];

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                // ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return Builder<\App\Models\Colaborator>
    */
    public function datasource(): Builder
    {
        return Colaborator::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('surname')
            ->addColumn('lastname')
            ->addColumn('trigramme')
            ->addColumn('updated_at_formatted', fn (Colaborator $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->searchable()
                ->sortable(),

            Column::make('NOM DE FAMILLE', 'surname')
                ->sortable()
                ->searchable(),

            Column::make('PRÈNOM', 'lastname')
                ->sortable()
                ->searchable(),

            Column::make('TRIGRAMME', 'trigramme')
                ->sortable()
                ->searchable(),

            Column::make('LAST UPDATED', 'updated_at_formatted', 'updated_at')
                ->searchable()
                ->sortable()
        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Colaborator Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
                ->class('btn btn-primary btn-sm m-1')
                ->target("_self")
                ->emit('colaboratorEdit', ['id' => 'id']),

           Button::make('destroy', 'Delete')
                ->class('btn btn-danger btn-sm m-1')
                ->target("_self")
                ->emit('colaboratorDelete', ['id' => 'id']),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Colaborator Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($colaborator) => $colaborator->id === 1)
                ->hide(),
        ];
    }
    */

    public function onUpdatedEditable(string $id, string $field, string $value): void
    {
        Colaborator::find($id)->update([$field => $value]);
    }
}
