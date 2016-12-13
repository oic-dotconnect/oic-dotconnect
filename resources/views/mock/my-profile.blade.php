@include('components/my-profile')
@include('components/my-tag-list', [ 'tags' => Auth::user()->tags ])

@include('components/user-profile', [ 'user' => Auth::user() ])