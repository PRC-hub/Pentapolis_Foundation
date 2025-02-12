@extends('layouts.app')
@include('partials.header', ['header' => $header])
@include('partials.capacityBuilding', ['capacityData' => $capacityData])
@include('partials.footer', ['footerData' => $footerData])