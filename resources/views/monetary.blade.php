@extends('layouts.app')
@include('partials.header', ['header' => $header])
@include('partials.monetary', ['monetaryData' => $monetaryData])
@include('partials.footer', ['footerData' => $footerData])