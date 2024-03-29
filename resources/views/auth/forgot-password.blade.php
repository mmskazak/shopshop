@extends('layouts.auth')

@section('title','Вход в аккаунт')

@section('content')
    @if(session()->has('message'))
        <p class="alert {{ session()->get('alert-class', 'alert-info') }}">{{ session()->get('message') }}</p>
    @endif
    <x-forms.auth-forms title="Забыли пароль" action="" method="POST">
        @csrf

        <x-forms.text-input
            :isError="true"
            type="email"
            value="{{ request('email') }}"
            placeholder="Email"
            required="$errors->has('email')"
        >
        </x-forms.text-input>
        @error('email')
        <x-forms.error>
            {{ $message }}
        </x-forms.error>
        @enderror


        <x-forms.primary-button>
            Отправить
        </x-forms.primary-button>


        <x-slot:socialAuth>
        </x-slot:socialAuth>

        <x-slot:buttons>
            <div class="space-y-3 mt-5">
                <div class="text-xxs md:text-xs"><a href="{{ route('login') }}" class="text-white hover:text-white/70 font-bold">Вспомнил пароль</a></div>
            </div>
        </x-slot:buttons>
    </x-forms.auth-forms>
@endsection
