@inject('eventservice','App\Services\EventService')

<div class="control-eventitem">
	<div class="control-eventitem-left">
		<div class="control-eventitem-left-content">
			<div class="control-eventitem-status {{ $event->status }}">
				{{ $eventservice->status($event) }}
			</div>
			<div class="control-eventitem-action">
				@if( $event->status === 'open')
					{{ Form::open([ 'route' => [ 'post-event-status', $event->code ]]) }}
							<button type="submit" class="button stop" name="status" value="stop">中止する</button>
					{{ Form::close() }}
				@elseif($event->status === 'close') 
					{{ Form::open([ 'route' => [ 'post-event-status', $event->code ]]) }}
							<button type="submit" class="button open" name="status" value="open">公開する</button>
					{{ Form::close() }}
				@endif 
			</div>
		</div>
	</div>
	<div class="control-eventitem-center">
		<div class="control-eventitem-center-content">
			<div class="control-eventitem-center-left">
				<div class="control-eventitem-field {{ $event->field }}">
					{{ $eventservice->field($event->field) }}
				</div>
				<div class="control-eventitem-condition {{ $eventservice->conditionClass($event) }}">
						{{ $eventservice->condition($event) }}
				</div>
			</div>
			<div class="control-eventitem-center-right">
				<div class="control-eventitem-name">
					<a href="{{ route('event-detail', [ 'event_code' => $event->code ]) }}">{{ $event->name }}</a>
				</div>
				<div class="control-eventitem-opening-date">
					開催日：{{ $eventservice->dateSide($event->opening_date)}}
				</div>
				<div class="control-eventitem-entry-num">
					参加者数：{{ $event->entry_num() }}人
				</div>
			</div>
		</div>
	</div>
	<div class="control-eventitem-right">
		<div class="control-eventitem-right-content">
			<a href="{{ route('event-edit', ['event_code' => $event->code]) }}" class="button edit">編集する</a>
			{{ Form::open([ 'route' => ['event-delete', $event->code]  ]) }}
				<button type="submit" class="button delete">削除する</button>
			{{ Form::close() }}
		</div>
	</div>
</div>