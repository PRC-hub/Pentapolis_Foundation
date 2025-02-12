@extends('layouts.app')
@include('partials.header', ['header' => $header])
@include('partials.communityEngagement', ['engagementData' => $engagementData])
@include('partials.footer', ['footerData' => $footerData])