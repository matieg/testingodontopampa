@extends('layouts.main')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu dirección de email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Antes de continuar, por favor verifica tu dirección de email.') }}
                    {{ __('Si no recibiste ningún mail') }}, <a href="{{ route('verification.resend') }}">{{ __('clickea aquí para enviar uno nuevo') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
