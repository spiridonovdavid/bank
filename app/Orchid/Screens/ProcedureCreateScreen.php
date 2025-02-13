<?php

namespace App\Orchid\Screens;

use Orchid\Screen\Screen;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Actions\Button;
use Orchid\Support\Facades\Layout;
use App\Models\Procedure;
use Illuminate\Http\Request;

class ProcedureCreateScreen extends Screen
{
    public $name = 'Создать Процедуру';

    public $description = 'Форма для создания новой процедуры';

    public function query(): array
    {
        return [];
    }

    public function commandBar(): array
    {
        return [
            Button::make('Сохранить')
                ->icon('check')
                ->method('save'),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::rows([
                Input::make('procedure.surname')
                    ->title('Фамилия')
                    ->placeholder('Введите фамилию')
                    ->required(),

                Input::make('procedure.name')
                    ->title('Имя')
                    ->placeholder('Введите имя')
                    ->required(),

                Input::make('procedure.patronymic')
                    ->title('Отчество')
                    ->placeholder('Введите отчество'),

                DateTimer::make('procedure.birth_date')
                    ->title('Дата рождения')
                    ->format('Y-m-d')
                    ->placeholder('Выберите дату рождения'),

                Input::make('procedure.case_number')
                    ->title('Номер дела')
                    ->placeholder('Введите номер дела'),

                Input::make('procedure.court_name')
                    ->title('Название суда')
                    ->placeholder('Введите название суда'),

                Input::make('procedure.inn')
                    ->title('ИНН')
                    ->placeholder('Введите ИНН'),

                Input::make('procedure.snils')
                    ->title('СНИЛС')
                    ->placeholder('Введите СНИЛС'),

                Select::make('procedure.manager')
                    ->title('Арбитражный управляющий')
                    ->options([
                        'Иван Иванов' => 'Иван Иванов',
                        'Анатолий Анатольев' => 'Анатолий Анатольев'
                    ]),

                TextArea::make('procedure.comment')
                    ->title('Комментарий')
                    ->rows(3)
                    ->placeholder('Введите комментарий'),
            ]),
        ];
    }

    public function save(Request $request)
    {
        $data = $request->get('procedure');

        $validated = validator($data, [
            'surname' => 'required',
            'name' => 'required',
            // остальные поля необязательны согласно миграции
        ])->validate();

        Procedure::create($data);

        return redirect()->route('platform.procedures');
    }
}
