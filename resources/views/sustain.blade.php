@extends('layouts.app')
@include('partials.header', ['header' => $header])
@include('partials.sustainableDevelopment', ['sustainableData' => $sustainableData])
@include('partials.footer', ['footerData' => $footerData])