@extends('layouts.app')
@include('partials.header', ['header' => $header])
@include('partials.galleryLoadmore',['images'=> $images])
@include('partials.footer', ['footerData' => $footerData])