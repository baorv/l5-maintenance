<!doctype html>
<title>{{ config('maintenance.title', trans('maintenance::maintenance.title')) }}</title>
<style>
    body {
        text-align: center;
        padding: 150px;
    }

    h1 {
        font-size: 50px;
    }

    body {
        font: 20px Helvetica, sans-serif;
        color: #333;
    }

    article {
        display: block;
        text-align: left;
        width: 650px;
        margin: 0 auto;
    }

    a {
        color: #dc8100;
        text-decoration: none;
    }

    a:hover {
        color: #333;
        text-decoration: none;
    }
</style>

<article>
    <h1>@lang('maintenance::maintenance.intro')</h1>
    <div>
        <p>@lang('maintenance::maintenance.description', ['contact' => config('maintenance.contact')])</p>
        <p>&mdash; @lang('maintenance.team')</p>
    </div>
</article>