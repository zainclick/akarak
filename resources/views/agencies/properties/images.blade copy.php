@php
    $title_page=__('admin/agents/create.title');
@endphp
@extends('layouts.agent')
@section('content')
<div class="col-12 p-3">
		<!-- breadcrumb -->
		<x-bread-crumb :breads="[
			['url' => url('/agent/dashboard') , 'title' => __('main.dashboard') , 'isactive' => false],
			['url' => route('admin.agents.index') , 'title' => __('admin/agents/index.title') , 'isactive' => false],
			['url' => '#' , 'title' =>  __('admin/agents/create.title'), 'isactive' => true],
		]">
		</x-bread-crumb>
	<!-- /breadcrumb -->

<div class="row">
        <div class="col-12">
            <div class="card" style="zoom: 1;">
             
                <div class="card-content collapse show" style="">
                    <div class="card-body">
                        <button id="clear-dropzone" class="btn btn-primary mb-1">
                        <i class="ft-trash"></i>Clear Dropzone</button>
                        
      <form action="{{route('agent-properties-images-store')}}" method="post" class='dropzone' >
      @csrf

      </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection



@section('scripts')


    <script>
    var uploadedDocumentMap = {}
    new Dropzone(".dropzone",{
    
        paramName: "file",
        maxFilesize: 5,
        clickable: true,
        addRemoveLinks: true,
        acceptedFiles: "image/*",
        dictFallbackMessage: "",
        dictInvalidFileType: "",
        dictCancelUpload: "",
        dictCancelUploadConfirmation: "",
        dictRemoveFile: "",
        dictMaxFilesExceeded: "",
        headers: {

            'X-CSRF-TOKEN':
            "{{csrf_token()}}"
        },

        url: "{{route('agent-properties-images-store')}}",
        success: 
        function (file, response) {
            $('form').append('<input type="hidden" name="document[]" value="'+ response.name +'">')
            uploadedDocumentMap[file.name] = rersponse.name
        },
        removedfile: function (file) {
            file.previewElement.remove()
            var name = ''
            if(typeof file.file_name !== 'undefined') {
                name = file.file_name
            }else{
                name = uploadedDocumentMap[file.name]
            }
            $('form').find('input[name="document[]"][value="'+ name +'"]').remove()
        }
    
    });


    </script>



@endsection
