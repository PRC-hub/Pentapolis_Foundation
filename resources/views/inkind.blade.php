@extends('layouts.app')
@include('partials.header', ['header' => $header])
@include('partials.inkind', ['inKindData' => $inKindData])
@include('partials.footer', ['footerData' => $footerData])