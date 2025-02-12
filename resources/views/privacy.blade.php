@extends('layouts.app')
@include('partials.header', ['header' => $header])
@include('partials.privacyPolicy', ['privacyPolicy' => $privacyPolicy])
@include('partials.footer', ['footerData' => $footerData])