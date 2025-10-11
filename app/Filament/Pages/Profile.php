<?php

namespace App\Filament\Pages;

use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Pages\Page;
use Filament\Forms;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Filament\Forms\Components\TextInput;
class Profile extends Page
{

    use HasPageShield;
    protected static ?string $navigationIcon = 'heroicon-o-user-circle';
    /*عنوان گروه منو در نویگیشن*/
    protected static ?string $navigationGroup = 'تنظیمات';
    /*عنوان مدل*/
    protected static ?string $navigationLabel = 'پروفایل';
    protected static ?string $title = 'پروفایل';

    protected static string $view = 'filament.pages.profile';


    public $name;
    public $email;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->label('نام')
                ->required(),
            TextInput::make('email')
                ->label('ایمیل')
                ->email()
                ->required(),
        ];
    }

    public function submit()
    {
        $user = Auth::user();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->save();

        session()->flash('message', 'پروفایل شما با موفقیت به‌روزرسانی شد.');
    }


}
