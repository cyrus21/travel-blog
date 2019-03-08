@extends('layout')

@section('content')
    <form method="POST" action="/message">
        {{ csrf_field() }}
        <div class="contact-form">
            <div class="form-group">
                <label for="message_name">Name</label>
                <input 
                    class="form-control {{ $errors->has('message_name') ? 'has-error' : '' }}" 
                    name="message_name" 
                    type="text" 
                    placeholder="Enter Name" 
                    value="{{ old('message_name')}}" 
                />
                @if ($errors->has('message_name')) 
                    <span class="errors">{{ $errors->first('message_name') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="message_email">Email</label>
                <input 
                    class="form-control {{ $errors->has('message_email') ? 'has-error' : '' }}" 
                    name="message_email" 
                    type="text" 
                    placeholder="Enter Email" 
                    value="{{ old('message_email') }}" 
                 />
                @if ($errors->has('message_email'))
                    <span class="errors">{{ $errors->first('message_email') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="message_title">Title</label>
                <input 
                    class="form-control {{ $errors->has('message_title') ? 'has-error' : '' }}" 
                    name="message_title" 
                    type="text" 
                    placeholder="Enter Title"
                    value="{{ old('message_title') }}" 
                />
                @if ($errors->has('message_title'))
                    <span class="errors">{{ $errors->first('message_title') }}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="message_message">Message</label>
                <textarea 
                    class="form-control {{ $errors->has('message_details') ? 'has-error' : '' }}" 
                    name="message_details" 
                    placeholder="Enter Message"
                >{{ old('message_details') }}</textarea>
                @if ($errors->has('message_details'))
                    <span class="errors">{{ $errors->first('message_details') }}</span>
                @endif
            </div>
            <div class="form-group">
                <button class="btn success" type="submit">Submit</button>
            </div>
        </div>
    </form>
@endsection