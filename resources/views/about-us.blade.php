@extends('layouts.app')
@include('partials.header', ['header' => $header])
@include('partials.aboutUs', ['data' => $data])
@include('partials.footer', ['footerData' => $footerData])