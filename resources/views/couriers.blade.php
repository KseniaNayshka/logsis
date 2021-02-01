@extends('layout')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Курьеры</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <h6>Курьеры, назначенные на заказ</h6>
                </div>
                <div class="links">
                    <a href="http://logsis/">Главная</a>
                </div>
                @csrf
                <div class="wrapper">
                    <form method="GET" action="{{ url('couriers_date')}}" enctype="multipart/form-data">    
                        <div class="form-group row">
                            <div class="col-md-3">
                                <center>
                                    <p>Выберите дату:
                                    <input type="date" name="calendar" value="{{$date}}"/>
                                    <button class="btn btn-primary">
                                        Применить
                                    </button>
                                </center>   
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-3">
                                <center>
                                @if(count($fio) > 0)
                                    <h5>ФИО курьеров</h5>
                                    @foreach ($fio as $fio_cour)
                                        <h6>{{$fio_cour->fio}} </h6>
                                    @endforeach
                                @else
                                    <h5>Записи отсутствуют</h5>
                                @endif
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>