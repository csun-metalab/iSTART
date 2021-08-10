@extends('master')

@section('content')
    <h2 style="color: #000000; font-family: sans-serif; font-weight: 400; line-height: 1.4; margin: 0 0 30px;">Hello there,</h2>
    <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0 0 15px;">
        @if($user->getUserGroup->user_group === 'intervention')
            Thank you. You have now completed all web-app modules!
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0 0 15px;">After you complete the survey, you will receive a $25 Amazon.com gift card via email. Access the survey below:</p>
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0 0 15px;"> <a href="{{ env('INTERVENTION_LINK') }}" target="_blank" rel="noreferrer" style="color: rgb(55, 113, 220); font-size: 14px; font-weight: bold; text-align: center; text-decoration: underline;">{{ env('INTERVENTION_LINK') }}</a>.</p>
        @elseif($user->getUserGroup->user_group === 'comparison')
            Thank you for your participation in the web-app study. Please take the Exit survey now (it will take around 10 minutes).
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0 0 15px;">After you complete the survey, you will receive a $15 Amazon.com gift card via email. Access the survey below:</p>
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0 0 15px;"> <a href="{{ env('COMPARISON_LINK') }}" target="_blank" rel="noreferrer" style="color: rgb(55, 113, 220); font-size: 14px; font-weight: bold; text-align: center; text-decoration: underline;">{{ env('COMPARISON_LINK') }}</a>.</p>
        @else
            Thank you for being in the control group! Please take the Exit survey now (it will take around 10 minutes).
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0 0 15px;">After you complete the survey, you will receive a $20 Amazon.com gift card via email. Access the survey below:</p>
            <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0 0 15px;"> <a href="{{ env('CONTROL_LINK') }}" target="_blank" rel="noreferrer" style="color: rgb(55, 113, 220); font-size: 14px; font-weight: bold; text-align: center; text-decoration: underline;">{{ env('CONTROL_LINK') }}</a>.</p>
        @endif
@endsection
