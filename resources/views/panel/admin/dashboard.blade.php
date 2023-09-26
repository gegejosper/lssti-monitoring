@extends('layouts.panel')
@section('content')
<!--begin::Post-->
<div class="content flex-row-fluid" id="kt_content">
						
	<!--begin::Row-->
	<div class="row g-5 g-lg-10">
		<div class="col-lg-4">
			<div class="card card-custom card-stretch gutter-b">
				<div class="card-body pt-10 pb-20">
					<h5>Visitor's Log</h5>
						<table class="table table-bordered">
							<thead>
							<tr>
								<td>Time</td>
								<td>Name</td>
								<td>Contact #</td>
								<td>Address</td>
								<td>Purpose</td>
							</tr>
							</thead>
							
							<tbody id="visitors-table">
								@foreach($visitors as $visitor)
								<tr>
									<td>{{$visitor->time_visit}}</td>
									<td>{{$visitor->lname}}, {{$visitor->fname}}</td>
									<td>{{$visitor->contact_number}}</td>
									<td>{{$visitor->address}}</td>
									<td>{{$visitor->purpose}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
				</div>
			</div>
		</div>
		<div class="col-lg-8">
		<div class="card card-custom card-stretch gutter-b">
				<div class="card-body pt-10 pb-20">
				<h3>Employee's Log</h3>
					<table class="table table-bordered">
						<thead>
						<tr>
							<td>Time Out</td>
							<td>Time Back</td>
							<td>Time Consumed</td>
							<td>Name</td>
							<td>Purpose</td>
							<td>Status</td>
							
						</tr>
						</thead>
						
						<tbody id="employees-table">
							@foreach($employees_log as $log)
							<?php
							if($log->time_consumed != 'n/a'){
							$timeConsumed = $log->time_consumed; // Assuming it's in seconds

							// Calculate hours, minutes, and seconds
							$hours = floor($timeConsumed / 3600);
							$minutes = floor(($timeConsumed % 3600) / 60);
							$seconds = $timeConsumed % 60;
							$time_consumed_in_words =$hours.' hours '.$minutes.' minutes '.$seconds.' seconds'; 
							}else {
								$time_consumed_in_words = 'n/a';
							}
							?>
							<tr>
								<td>{{$log->time_out}}</td>
								<td id="row_time_back_{{$log->id}}">{{$log->time_back}}</td>
								<td id="row_time_consumed_{{$log->id}}">{{$time_consumed_in_words}}</td>
								<td>{{$log->employee_details->lname}}, {{$log->employee_details->fname}}</td>
								<td>{{$log->purpose}}</td>
								<td id="row_status_{{$log->id}}">{{$log->status}}</td>
								
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!--end::Row-->
</div>
<!--end::Post-->
@endsection