@extends('layouts.auth')

@section('title','Вход в аккаунт')

@section('content')
    <x-forms.auth-forms title="Восстановление пароля" action="{{ route('password.update') }}" method="POST">
        @csrf

        <input type="hidden" name="token" value="{{ $token  }}">
        <x-forms.text-input
            name="password"
            type="password"
            placeholder="Пароль"
            :isError="$errors->has('password')"
            required="true"
        >
        </x-forms.text-input>

        <x-forms.text-input
            name="password_confirmation"
            type="password"
            placeholder="Повтороите пароль"
            :isError="$errors->has('password_confirmation')"
            required="true"
        >
        </x-forms.text-input>

        @error('password_confirmation')
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror


        <x-forms.primary-button>
            Обновить пароль
        </x-forms.primary-button>

        <x-slot:socialAuth>
        </x-slot:socialAuth>

        <x-slot:buttons>
        </x-slot:buttons>
    </x-forms.auth-forms>
@endsection
