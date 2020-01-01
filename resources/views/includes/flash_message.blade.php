@foreach(['success', 'info', 'warning', 'danger'] as $message)
    @if(session()->has($message) && !isset($flash_message_status))
        <p class="alert alert-{{ $message }}">{{ session()->get($message) }}</p>
    @elseif(isset($flash_message_status) && $flash_message_status == $message)
        <p class="alert alert-{{ $message }}">{{ $flash_message }}</p>
    @endif
@endforeach