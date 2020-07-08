@extends('main')

<div class="container">
    {{ Form::open(array('url' => 'transaction')) }}

    <div class="form-group">
        <label for="txHash">Tx Hash</label>
        {{ Form::text('txHash', null, array('class' => 'form-control', 'id' => 'txHash', 'aria-describedby' => 'txHashHelp', 'placeholder' => 'Enter Tx Hash')) }}
        <small id="txHashHelp" class="form-text text-muted">Enter the hash of the transaction you wish to see</small>
        @if ($errors->has('txHash')) <p style="color:red;">{{ 'Tx Hash is required' }}</p> @endif
    </div>

    <div class="form-group">
        <label for="txDetailsTextArea">Tx details</label>
        @if(isset($result))
            <textarea class="form-control" id="txDetailsTextArea" rows="20">{{ $result }}</textarea>
        @else
            <textarea class="form-control" id="txDetailsTextArea" rows="3">No tx data yet !</textarea>
        @endif
    </div>

    {{ Form::submit('Find tx', array('class' => 'btn btn-primary')) }}
    {{ Form::close() }}
</div>