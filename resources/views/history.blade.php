@extends('layouts.app')
@include('partials.salesperson_dashboard.history',['historyRecords' => $historyRecords])