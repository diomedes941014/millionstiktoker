@section('title', 'Home')
@include('template/header')
<div class="main bg">
    <div class="container d-flex justify-content-center py-3">
        <div class="col-sm-6">
            @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
            @elseif (\Session::has('error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! \Session::get('error') !!}</li>
                </ul>
            </div>
            @else
            <form action="{{ route('verification.check') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label for="code">Verification Code:</label>
                    <input type="text" class="form-control" name="code" id="code">
                </div>
                <button type="submit" class="btn btn-primary">Verify</button>
            </form>
            @endif
        </div>
    </div>
</div>
@include('template/footer')
