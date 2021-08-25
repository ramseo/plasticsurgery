@extends('backend.layouts.app')

@section('title') Profile @endsection

@section('breadcrumbs')
<x-backend-breadcrumbs>
{{--    <x-backend-breadcrumb-item route='{{route("backend.profile")}}' icon='c-icon cil-people' >--}}
{{--        Service--}}
{{--    </x-backend-breadcrumb-item>--}}
    <x-backend-breadcrumb-item type="active">Edit</x-backend-breadcrumb-item>
</x-backend-breadcrumbs>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <h4 class="card-title mb-0">
                    <i class="c-icon cil-people"></i>  Profile <small class="text-muted">Create</small>
                </h4>
                <div class="small text-muted">
                    Profile Management
                </div>
            </div>
        </div>
        <hr>

        <div class="row mt-4">
            <div class="col">
                {{ Form::open(array('route' =>'vendor.profile.update', 'files' => true,'id' => 'profileForm')) }}
                <div class="row">
                    <div class="col-6 col-md-4">
                        <div class="form-group">
                            {{ Form::label('business_name', 'Business Name') }} {!! fielf_required("required") !!}
                            {{ Form::text('business_name', $vendor->business_name, array('class' => 'form-control')) }}
                        </div>
                    </div>

                    <div class="col-6 col-md-4">
                        <div class="form-group">
                            {{ Form::label('wedding_covered', 'Number of weddings covered') }}
                            {{ Form::text('wedding_covered', $vendor->wedding_covered, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="form-group">
                            {{ Form::label('image', 'Profile Image') }} {!! fielf_required("required") !!}
                            <div class="custom-file">
                                <input type="file" class="custom-file-input"  name="image">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            {{ Form::label('price', 'Default Price') }}  {!! fielf_required("required") !!}
                            {{ Form::number('price', $vendor->price, array('class' => 'form-control', 'placeholder'=> 'Service default price')) }}
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            {{ Form::label('label', 'Price Label') }}  {!! fielf_required("required") !!}
                            {{ Form::text('label', $vendor->label, array('class' => 'form-control', 'placeholder'=> 'Price label')) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            {{ Form::label('business_address', 'Address') }}  {!! fielf_required("required") !!}
                            {{ Form::textarea('business_address', $vendor->business_address, array('class' => 'form-control')) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            {{ Form::label('travel_to_other_cities', 'Travel to other Indian cities?') }} {!! fielf_required("required") !!}
                            <br>
                           Yes  {{ Form::radio('travel_to_other_cities', 1, $vendor->travel_to_other_cities == 1?  true : false) }}
                           No {{ Form::radio('travel_to_other_cities', 0, $vendor->travel_to_other_cities == 0 ? true : false) }}
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            {{ Form::label('website_link', 'Website') }}
                            {{ Form::text('website_link', $vendor->website_link, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            {{ Form::label('facebook_link', 'Facebook') }}
                            {{ Form::text('facebook_link', $vendor->facebook_link, array('class' => 'form-control')) }}
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            {{ Form::label('instagram_link', 'Instagram') }}
                            {{ Form::text('instagram_link', $vendor->instagram_link, array('class' => 'form-control')) }}
                        </div>
                    </div>
                </div>

                <div class="row">

                </div>


                <div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            {{ html()->submit($text = icon('fas fa-save')." Save")->class('btn btn-success') }}
                        </div>
                    </div>

                    <div class="col-8">
                        <div class="float-right">

{{--                            <a href="{{route("backend.profile")}}" class="btn btn-warning" data-toggle="tooltip" title="{{__('labels.backend.cancel')}}"><i class="fas fa-reply"></i> Cancel</a>--}}
                        </div>
                    </div>
                </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="card-footer">
        <div class="row">
            <div class="col">
                <small class="float-right text-muted">
                    Updated: {{$vendor->updated_at->diffForHumans()}},
                    Created at: {{$vendor->created_at->isoFormat('LLLL')}}
                </small>
            </div>
        </div>
    </div>
</div>

@stop

@push ('after-scripts')
    <script type="text/javascript">
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endpush
