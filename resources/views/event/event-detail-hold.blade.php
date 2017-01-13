@extends('event.event-detail-layout')

@section('hold')
	@if ($event->status == "open")
		<div class="hold-menu box">
			<h2 class="box-title purple">管理者メニュー</h2>
			<div class="hold-menu-content">
				<span class="hold-event-status">状態：公開中</span>
				<div class="hold-event-control">
					<a class="button edit" href="{{ route('event-edit', [ 'event_code' => $event->code ]) }}">編集する</a>
					{{ Form::open([ 'route' => [ 'post-event-status', $event->code ]]) }}
						<button type="submit" class="button cancell" name="status" value="stop">中止する</button>
					{{ Form::close() }}
				</div>
			</div>			
		</div>
	@elseif ($event->status == "close")	
		<div class="hold-menu box">
			<h2 class="box-title purple">管理者メニュー</h2>
			<div class="hold-menu-content">
				<span class="hold-event-status">状態：下書き</span>
				<div class="hold-event-control">
					<a class="button edit" href="{{ route('event-edit', [ 'event_code' => $event->code ]) }}">編集する</a>
					{{ Form::open([ 'route' => [ 'post-event-status', $event->code ]]) }}
						<button type="submit" class="button open" name="status" value="open">公開する</button>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	@endif
@endsection

@section('subscription')
@include('components.event-detail-button', [ 'current' => 'hold' ])
@endsection