@extends('layouts.app')
@include('partials.header', ['header' => $header])
@include('partials.humanitarianAssistance', ['humanitarianData' => $humanitarianData])
@include('partials.footer', ['footerData' => $footerData])