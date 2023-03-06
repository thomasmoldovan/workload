<?php

namespace App\Http\Livewire\PromotionTypes;

use App\Models\PromotionType;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class PromotionTypesGrid extends PowerGridComponent
{
    use ActionButton;

    public $ve_distance;
    public $ve_present;
    public $ei;
    public $ss_distance;
    public $ss_present;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        // $this->showCheckBox();

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
    * @return Builder<\App\Models\PromotionType>
    */
    public function datasource(): Builder
    {
        return PromotionType::query();
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
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('ve_present')
            ->addColumn('ve_distance')
            ->addColumn('ei')
            ->addColumn('ss_present')
            ->addColumn('ss_distance');
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
            Column::make('ID', 'id'),

            Column::make('NAME', 'name')
                ->sortable()
                ->searchable(),

            Column::make('VE PRESENT', 've_present')
                ->sortable()
                ->searchable()
                ->editOnClick(true),

            Column::make('VE DISTANCE', 've_distance')
                ->sortable()
                ->searchable()
                ->editOnClick(true),

            Column::make('EI', 'ei')
                ->sortable()
                ->searchable()
                ->editOnClick(true),

            Column::make('SS PRESENT', 'ss_present')
                ->sortable()
                ->searchable()
                ->editOnClick(true),

            Column::make('SS DISTANCE', 'ss_distance')
                ->sortable()
                ->searchable()
                ->editOnClick(true)
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
     * PowerGrid PromotionType Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
        return [
            Button::make('edit', 'Edit')
                 ->class('btn btn-primary btn-sm m-1')
                 ->target("_self")
                 ->emit('promotionTypeEdit', ['id' => 'id']),
 
            // Button::make('destroy', 'Delete')
            //      ->class('btn btn-danger btn-sm m-1')
            //      ->target("_self")
            //      ->emit('promotionTypeDelete', ['id' => 'id']),
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
     * PowerGrid PromotionType Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($promotion-type) => $promotion-type->id === 1)
                ->hide(),
        ];
    }
    */

    public function onUpdatedEditable(string $id, string $field, string $value): void
    {
        PromotionType::find($id)->update([$field => $value]);
    }
}
