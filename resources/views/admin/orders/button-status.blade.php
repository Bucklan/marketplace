<div
    class="btn-group"
    role="group">
    <button
        id="btnGroupDrop1"
        type="button"
        class="{{$order['status_class']}} dropdown-toggle"
        data-toggle="dropdown"
        aria-haspopup="true"
        aria-expanded="false">
        {{$order['status']}}
    </button>

    <div
        class="dropdown-menu"
        aria-labelledby="btnGroupDrop1">

        @if($order['status'] == 'Confirmed' || $order['status'] == 'Canceled')
            @php $action = ($order['status'] == 'Confirmed') ? 'canceled' : 'confirmed'; @endphp
            @php $class = ($order['status'] == 'Confirmed') ? 'text-danger' : 'text-success'; @endphp
            @php $text = ($order['status'] == 'Confirmed') ? 'Cancel' : 'Confirm'; @endphp
            <form
                action="{{route('admin.orders.' . $action, $order['id'])}}"
                method="post">
                @csrf
                @method('PUT')
                <button
                    class="dropdown-item {{ $class }}">{{ $text }}</button>
            </form>
        @endif

        @if($order['status'] == 'Created')
            <form
                action="{{route('admin.orders.confirmed', $order['id'])}}"
                method="post">
                @csrf
                @method('PUT')
                <button
                    class="dropdown-item text-success">
                    Confirm
                </button>
            </form>
                <form
                    action="{{route('admin.orders.canceled', $order['id'])}}"
                    method="post">
                    @csrf
                    @method('PUT')
                    <button
                        class="dropdown-item text-danger">
                        Canceled
                    </button>
                </form>
        @endif
    </div>
</div>
