@extends('layouts.app')
@include('partials.header', ['header' => $header])
@include('partials.serviceDelivery', ['sectionsData' => $sectionsData])
@include('partials.footer', ['footerData' => $footerData])
