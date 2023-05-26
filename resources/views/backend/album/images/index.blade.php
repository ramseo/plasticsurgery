@extends ('backend.layouts.app')

@section('title') @endsection

@section('breadcrumbs')
<x-backend-breadcrumbs>
    <x-backend-breadcrumb-item type="active" icon=''></x-backend-breadcrumb-item>
</x-backend-breadcrumbs>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-8">
                <h4 class="card-title mb-0">
                    <i class="c-icon cil-people"></i>
                    <span class="text-capitalize"><?= $album->name ?></span>
                    <small class="text-muted">Album Images</small>
                </h4>
                <div class="small text-muted">
                    {{ Str::title('Images') }} Management Dashboard
                </div>
            </div>
        </div>

        <div class="row" style="clear: both;margin-top: 18px;">
            <div class="col-12">
                <div class="dropzone" id="file-dropzone"></div>
            </div>
        </div>
        <!--/.row-->
        <div>
            <div class="container">
                <div class="row">
                    <div class="gallery1 row">
                        @foreach ($images as $image)
                        <div class="col-3 gallery-col">
                            <div class="gallery-img-col">
                                <img class="img-fluid" src="{{ asset('storage/album').'/'.$image->album_id.'/'.$image->name }}" alt="img" />
                            </div>
                            <div class="gallery-action-col text-center">
                                <a onclick="return confirm('Are you sure?')" class="" href="{{ route('vendor.image.delete', $image->id) }}"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>


        </div>

    </div>

    <div class="col-12">
        <div class="btn-toolbar float-right vendor-img-bk-btn" role="toolbar" aria-label="Toolbar with button groups">
            <a href="{{ route('vendor.album.index') }}" class="btn btn-warning" data-toggle="tooltip" title="{{__('labels.backend.cancel')}}">
                <i class="fas fa-reply"></i>
                Cancel
            </a>
        </div>
    </div>

</div>
@endsection



@push ('after-styles')
<style>
    .gallery-img-col {
        height: 200px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .gallery-action-col {
        background: #F88379;
    }

    .gallery-action-col a {
        color: white;
        display: block;
        width: 100%;
        padding: 5px 0;
        text-decoration: none !important;
    }

    .gallery-col {
        margin-bottom: 30px;
    }

    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }

    img {
        display: block;
    }

    .gallery {
        position: relative;
        z-index: 2;
        padding: 10px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-flow: row wrap;
        flex-flow: row wrap;
        -webkit-box-pack: justify;
        -ms-flex-pack: justify;
        justify-content: space-between;
        -webkit-transition: all .5s ease-in-out;
        transition: all .5s ease-in-out;
    }

    .gallery.pop {
        -webkit-filter: blur(10px);
        filter: blur(10px);
    }

    .gallery figure {
        -ms-flex-preferred-size: 33.333%;
        flex-basis: 33.333%;
        padding: 10px;
        overflow: hidden;
        border-radius: 10px;
        cursor: pointer;
    }

    .gallery figure img {
        width: 100%;
        border-radius: 10px;
        -webkit-transition: all .3s ease-in-out;
        transition: all .3s ease-in-out;
    }

    .gallery figure figcaption {
        display: none;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
@endpush
@push ('after-scripts')

<script type="text/javascript">
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
<script>
    Dropzone.options.fileDropzone = {
        url: '<?= route('vendor.image.store', $album->id) ?>',
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        maxFilesize: 1000,
        headers: {
            'X-CSRF-TOKEN': "<?= csrf_token() ?>"
        },
        removedfile: function(file) {
            var name = file.upload.filename;
            $.ajax({
                type: 'POST',
                url: '<?= route('vendor.image.remove') ?>',
                data: {
                    "_token": "<?= csrf_token() ?>",
                    name: name
                },
                success: function(data) {
                    console.log("File has been successfully removed!!");
                },
                error: function(e) {
                    console.log(e);
                }
            });
            var fileRef;
            return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },
        success: function(file, response) {
            console.log(file);
        },
    }
</script>


@endpush