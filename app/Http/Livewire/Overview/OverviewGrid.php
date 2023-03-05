<?php

namespace App\Http\Livewire\Overview;

use App\Models\Colaborator;
use App\Services\OverviewService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridEloquent;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Rules\Rule;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;

final class OverviewGrid extends PowerGridComponent
{
    use ActionButton;

    public int   $perPage = 1000;

    protected $listeners = ['colaboratorView' => 'colaboratorView'];

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */
    public function datasource(): ?Collection
    {
        $overviewService = new OverviewService();
        $overview = $overviewService->getOverview();

        return collect($overview);
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */
    public function setUp(): array
    {
        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make(),
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
            ->addColumn('responsable_pedagogique')
            ->addColumn('pilote_projet')
            ->addColumn('face_a_face')
            ->addColumn('suivi_eleve')
            ->addColumn('conception_nationale')
            ->addColumn('activites_campus')
            ->addColumn('autre_activites')
            ->addColumn('total');
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
            Column::make('Nom', 'name')
                ->searchable()
                ->sortable(),
            Column::make('Resp. Ped.', 'responsable_pedagogique')
                ->searchable()
                ->sortable(),
            Column::make('Plan. Projets', 'pilote_projet')
                ->searchable()
                ->sortable(),
            Column::make('Face a Face', 'face_a_face')
                ->searchable()
                ->sortable(),
            Column::make('Suivi Élèves', 'suivi_eleve')
                ->searchable()
                ->sortable(),
            Column::make('Con. Nat.', 'conception_nationale')
                ->searchable()
                ->sortable(),
            Column::make('Act. Campus', 'activites_campus')
                ->searchable()
                ->sortable(),
            Column::make('Autres Act.', 'autre_activites')
                ->searchable()
                ->sortable(),
            Column::make('Total.', 'total')
                ->searchable()
                ->sortable(),

        ];
    }

    public function actions(): array
    {
       return [
           Button::make('view', '<i class="fas fa-eye"></i>')
                ->class('btn btn-primary btn-sm m-1')
                ->route('dashboard.index', ['id' => 'id'])
       ];
    }

    public function actionRules(): array
    {
        return [
            Rule::rows()
                ->when(function ($overview) { 
                    return $overview->total > 100;
                })
                ->setAttribute('class', 'warning'),
        ];
    }

    public function colaboratorView($id)
    {
        $test = $id;
        return redirect(route('colaborator.view', $id));
    }
}
