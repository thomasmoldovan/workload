<?php

namespace App\Http\Livewire\Promotions;

use App\Models\Promotion;
use App\Models\PromotionType;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class PromotionsGrid extends PowerGridComponent
{
    use ActionButton;

    public $presence_days;
    public $presence_weeks;
    public $enterprise_days;
    public $enterprise_weeks;

    public int $perPage = 999;

    public string $sortField = 'id';
    
    public string $sortDirection = 'desc';

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
    * @return Builder<\App\Models\Promotion>
    */
    public function datasource(): Builder
    {
        return Promotion::query()
            ->join("promotion_types as pt", "promotions.promotion_type_id", "=", "pt.id")
            ->select("promotions.*", "pt.name as promotion_type_name");
    }

    public function promotionTypes(): Collection
    {
        return PromotionType::all();
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
        return [
            'promotion_type' => [ // relationship on dishes model
                'name', // column enabled to search
            ],
        ];
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
            ->addColumn('promotion_type_name')
            ->addColumn('presence_weeks')
            ->addColumn('presence_days')
            ->addColumn('enterprise_weeks')
            ->addColumn('enterprise_days');
            // ->addColumn('updated_at_formatted', fn (Promotion $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
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
                ->sortable()
                ->searchable(),

            Column::make('NOM', 'name')
                ->sortable()
                ->searchable(),

            Column::make('TAPER', 'promotion_type_name')
                ->sortable()
                ->searchable(),

            Column::make('PRES. SEM.', 'presence_weeks')
                ->sortable()
                ->searchable()
                ->editOnClick(true, '', null, true),

            Column::make('PRES. JOURS', 'presence_days')
                ->sortable()
                ->searchable()
                ->editOnClick(true, '', null, true),

            Column::make('ENTER. SEM.', 'enterprise_weeks')
                ->sortable()
                ->searchable()
                ->editOnClick(true, '', null, true),

            Column::make('ENTER. JOURS', 'enterprise_days')
                ->sortable()
                ->searchable()
                ->editOnClick(true, '', null, true)
                
            //     ,

            // Column::make('UPDATED AT', 'updated_at_formatted', 'updated_at')
            //     ->searchable()
            //     ->sortable(),

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
     * PowerGrid Promotion Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
        return [
            Button::make('edit', 'Edit')
                 ->class('btn btn-primary btn-sm m-1')
                 ->target("_self")
                 ->emit('promotionEdit', ['id' => 'id']),
 
            Button::make('destroy', 'Delete')
                 ->class('btn btn-danger btn-sm m-1')
                 ->target("_self")
                 ->emit('promotionDelete', ['id' => 'id']),
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
     * PowerGrid Promotion Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($promotion) => $promotion->id === 1)
                ->hide(),
        ];
    }
    */

    public function onUpdatedEditable(string $id, string $field, string $value): void
    {
        Promotion::query()->find($id)->update([$field => $value]);
    }
}
