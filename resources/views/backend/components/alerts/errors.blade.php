  {{-- Errors Notifications --}}
  @if ($errors->any())
  <div class="alert alert-danger">
      <div class="mb-0">
          @foreach ($errors->all() as $error)
              <p>{{ $error }}</p>
          @endforeach
      </div>
  </div>
  @endif
