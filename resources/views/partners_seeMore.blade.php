@extends('layouts.app')
@include('partials.header', ['header' => $header])
@include('partials.partners_seeMore', ['partnersSeeMoreData' => $partnersSeeMoreData])
@include('partials.footer', ['footerData' => $footerData])

