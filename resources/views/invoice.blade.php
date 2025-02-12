@extends('layouts.app')

@include('partials.salesperson_dashboard.invoice',['invoices'=>$invoices])