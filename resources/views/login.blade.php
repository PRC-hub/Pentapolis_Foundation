@extends('layouts.app')
<meta name="csrf-token" content="{{ csrf_token() }}">
@include('partials._login_form')

