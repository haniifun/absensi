@extends('errors::illustrated-layout')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __('Anda tidak memiliki akses ke halaman ini!' ?: 'Forbidden'))
