@extends('layouts.app')

@section('content')

    <div class="logotype-container"><a href="/" class="logotype-link"><img src="../app/img/logo.png"
                                                                           alt="Логотип"></a></div>
        <div class="auth-content">
                <div class="auth-title">Вход в ГеймсМаркет</div>


                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail </label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Пароль</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"
                                       required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" class="auth-checkbox"
                                               name="remember" {{ old('remember') ? 'checked' : '' }}>
                                       Логин
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn-primary btn">
                                    Войти
                                </button>

                                <a class="btn-link btn" href="{{ route('password.request') }}">
                                   Забыли пароль ?
                                </a>
                            </div>
                        </div>
                    </form>


        </div>

@endsection
