@extends('landingpage.layout')
@section('content')

        @if (session()->has('success'))
            <script>
                $(function () {
                    $.notify({
                        title: '<strong></strong>',
                        icon: 'fas fa-check-circle',
                        message: "{{ session()->get('success') }} !"
                    }, {
                        type: 'success',
                        animate: {
                            enter: 'animated slideInRight',
                            exit: 'animated slideOutRight'
                        },
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        offset: 20,
                        spacing: 10,
                        z_index: 1031,
                    });
                });
            </script>
          
            @elseif(session()->has('warning'))
        <script>
            $(function() {
                $.notify({
                    title: '<strong></strong>',
                    icon: 'fas fa-exclamation-circle',
                    message: "{{ session()->get('warning') }} !"
                }, {
                    type: 'warning',
                    animate: {
                        enter: 'animated slideInRight',
                        exit: 'animated slideOutRight'
                    },
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                });
            });

        </script>
    @endif
    @foreach ($page->sections as $key => $section)
           @include($section->theme->link_code)         
    @endforeach
@endsection
@section('javascript')
