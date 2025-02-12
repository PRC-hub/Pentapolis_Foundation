@extends('layouts.app')
@include('partials.header', ['header' => $header])
@include('partials.volunteer', ['volunteerData' => $volunteerData])
@include('partials.footer', ['footerData' => $footerData])