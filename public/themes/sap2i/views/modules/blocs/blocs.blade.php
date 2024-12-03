@empty(!$blocs)
    @foreach ($blocs as $index => $bloc)
        @empty(!$bloc['acf_fc_layout'])
            @include('views.modules.blocs.'.$bloc['acf_fc_layout'])
        @endempty
    @endforeach
@endempty
   
