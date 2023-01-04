
@extends('layouts.front')

@section('content')

	<div id="body">
		<h2 style="color: #000;">Contact</h2>
		<form action="index.html">
			<h3 style="color: #000;">Inquiries</h3>
			<label for="name">
				<span style="color: #000;">Name</span>
				<input type="text" id="name">
			</label>
			<label for="email">
				<span style="color: #000;">Email</span>
				<input type="text" id="email">
			</label>
			<label for="subject">
				<span style="color: #000;">Subject</span>
				<input type="text" id="subject">
			</label>
			<label for="message">
				<span style="color: #000;">Message</span>
				<textarea name="message" id="message" cols="30" rows="10"></textarea>
			</label>
			<input type="submit" id="send" value="Send">
		</form>
	</div>
@endsection 	