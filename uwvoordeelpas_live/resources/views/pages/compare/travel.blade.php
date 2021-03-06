@extends('template.theme')

{{--*/ $pageTitle = 'Reisverzekering' /*--}}

@section('content')
	<div class="container">
	     <div class="ui breadcrumb">
	        <a href="{{ url('/') }}" class="sidebar open">Home</a>
	        <i class="right chevron icon divider"></i>

	        <a href="{{ url('compare') }}" class=" section">Vergelijken</a>
	        <i class="right chevron icon divider"></i>

	        <span class="active section"><h1>Reisverzekering</h1></span>

	    </div>

	    <div class="ui divider"></div>
	   	
	   	@include('pages.compare.menu')<br />

	    {!! isset($contentBlock[41]) ? $contentBlock[41] : '' !!}
	</div>
@stop