<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sms Code</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.min.css">
    </head>
    <body>
        <section>
            <div class="container">
                <div class="pt-5 pb-5"></div>

                <div class="row">
                    <div class="col-md-4 offset-md-4">
                        <div class="card mb-3">
                            @if($code = session('success_code'))
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ __('Thank you!') }}
                                    </h5>

                                    <div class="alert alert-success">
                                        {{ __('Your confirmation code is :code', compact('code')) }}
                                    </div>

                                    <a href="/" class="btn btn-primary btn-block">
                                        {{ __('Retry again') }}
                                    </a>
                                </div>
                            @elseif(session('failure_code'))
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ __('We are sorry...') }}
                                    </h5>

                                    <div class="alert alert-danger">
                                        {{ __('We could not to do it or your message not contains any code...') }}
                                    </div>

                                    <a href="/" class="btn btn-primary btn-block">
                                        {{ __('Retry again') }}
                                    </a>
                                </div>
                            @else
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{ __('How it works?') }}
                                    </h5>

                                    <p class="cart-title text-muted">
                                        {{ __('Just insert your message in the field below and press the button.') }}
                                    </p>

                                    {{ Form::open(['url' => '/', 'method' => 'post']) }}
                                        <div class="form-group">
                                            {{ Form::label('message', __('Insert your message:')) }}
                                            {{ Form::textarea('message', null, ['class' => 'form-control' . ($errors->has('message') ? ' is-invalid' : ''), 'autofocus']) }}

                                            @if($errors->has('message'))
                                                <div class="invalid-feedback">
                                                    {{ $errors->first('message') }}
                                                </div>
                                            @endif
                                        </div>

                                        {{ Form::submit(__('Fetch the code'), ['class' => 'btn btn-primary btn-block']) }}
                                    {{ Form::close() }}
                                </div>
                            @endif
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ __('Only one simple script') }}
                                </h5>

                                <p class="card-text text-muted mb-5">
                                    {{ __('This is the code which do all the magic =)') }}
                                </p>

<pre>
if (! function_exists('sms_code')) {
    function sms_code(string $message) :? string {
        $message = " {$message} ";
        $match = preg_match('/\b[\d]{4}[\s\n]/', $message, $matches);
        return isset($matches[0]) ? trim($matches[0]) : null;
    }
}
</pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-5 pb-5"></div>
        </section>
    </body>
</html>
