<?php

namespace App\Filament\Pages;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms\Components\TextInput;
use Filament\Pages\Page;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Filament\Widgets\StatsOverviewWidget;
class ChangePassword extends Page
{

    use HasPageShield;
    protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    protected static string $view = 'filament.pages.change-password';
    /*عنوان گروه منو در نویگیشن*/
    protected static ?string $navigationGroup = 'تنظیمات';
    /*عنوان مدل*/
    protected static ?string $navigationLabel = 'تغییر رمز';
    protected static ?string $title = 'تغییر رمز';



    public $current_password;
    public $new_password;
    public $new_password_confirmation;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('current_password')
                ->label('رمز عبور فعلی')
                ->password()
                ->required(),
            TextInput::make('new_password')
                ->label('رمز عبور جدید')
                ->password()
                ->required(),
            TextInput::make('new_password_confirmation')
                ->label('تایید رمز عبور جدید')
                ->password()
                ->same('new_password')
                ->required(),
        ];
    }

    public function submit()
    {
        $user = Auth::user();

        // بررسی صحت رمز عبور فعلی
        if (!Hash::check($this->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => 'رمز عبور فعلی اشتباه است.',
            ]);
        }

        // تغییر رمز عبور
        $user->password = Hash::make($this->new_password);
        $user->save();

        session()->flash('message', 'رمز عبور شما با موفقیت تغییر یافت.');
    }
    public function getHeaderWidgetsColumns(): int | array
    {
        return 3;
    }


}
