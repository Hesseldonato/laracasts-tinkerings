@if(Session::has('flash_message'))
    <div class="alert alert-{{ Session::get('flash_message_level') }}">
        <strong>{{ Session::get('flash_message') }}</strong>
    </div>
@endif