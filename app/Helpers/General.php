<?php
use App\Models\Job;

function dataFilter($data)
{

    $data->filter(function ($value , $key)
    {

        return $value->description = Str::limit($value->description , 80, '.......');

    });

    return $data;
}

function typeTime()
{
    $data = [
        '1'=>'دوام كامل',
        '2' => 'دوام جزئى',
    ];

    return $data;
}

function location()
{
    $data = [
        "الخرطوم",
        "امدرمان",
    ];

    return $data;
}

function allJobs()
{
    $data = [
        "مبرمج PHP",
        "مبرمج javaScript",
        "IT Support",
    ];

    return $data;
}

function typeStatus()
{
    $data = [
        '0' => 'غير نشط',
        '1'=>'نشط',
    ];

    return $data;
}

function contactFilter($data)
{

    $data->filter(function ($value , $key)
    {

        return $value->msg = Str::limit($value->msg , 30, '.......');

    });

    return $data;
}