<?php
namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use App\Models\Procedure;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use Orchid\Screen\Actions\Link;
use Orchid\Support\Facades\Layout;

class ProcedureScreen extends Screen
{
    public $name = 'Процедуры';
    public $description = 'Управление процедурами банкротства';

    public function query(): array
    {
        return [
            'procedures' => Procedure::paginate(),
        ];
    }

    public function commandBar(): array
    {
        return [
            Link::make('Создать')
                ->icon('plus')
                ->route('platform.procedure.create'),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::table('procedures', [
                TD::make('surname', 'Фамилия')->sort(),
                TD::make('name', 'Имя')->sort(),
                TD::make('patronymic', 'Отчество'),
                TD::make('birth_date', 'Дата рождения'),
                TD::make('case_number', 'Номер дела'),
                TD::make('court_name', 'Название суда'),
                TD::make('manager', 'Арбитражный управляющий'),
                TD::make('created_at', 'Создано')->render(fn($p) => $p->created_at->toDateString()),
                TD::make('edit', 'Действия')
                    ->render(fn($p) => Link::make('Редактировать')->route('platform.procedure.edit', $p))
            ]),
        ];
    }
}
