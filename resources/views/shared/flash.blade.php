@if(session('message'))
<div class="bg-blue-100 px-3 py-2">
  <i class="fas fa-exclamation-circle text-blue-600 mr-1"></i>
  <span class="text-blue-600">{{ session()->get('message') }}</span>
</div>
@endif