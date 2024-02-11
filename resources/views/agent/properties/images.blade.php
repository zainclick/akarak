@php
    $title_page=__('admin/agents/create.title');
@endphp
@extends('layouts.agent')
@section('content')
                            <form action="{{ route('agent-properties-images-store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- Here is start of gallery --}}
                                    <div class="tab" id="tab-2">
                                        <div class="gallery-box">
                                            <h4><i class="icon-16"></i>Upload images for properties</h4>
                                            <div class="upload-inner centred">
                                                <i class="fa fa-upload"></i>
                                                <div class="upload-box">
                                                    <input type="file" id="upload_imgs" name="images[]" multiple required
                                                        accept="image/*">
                                                        <input type="hidden" name="property_id" value="{{$id}}">
                                                    <label for="upload_imgs">Click here to upload</label>
                                                    @error('images')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="quote-imgs-thumbs quote-imgs-thumbs--hidden" id="img_preview"
                                                    aria-live="polite"></div>
                                                    
                                            </div>
                                            <button class="btn btn-success" id="submitEvaluation">حفظ</button>
                                        </div>
                                        
                                    </div>
                                    
                                </form>
                                    <script>
                                        var imgUpload = document.getElementById('upload_imgs'),
                                            imgPreview = document.getElementById('img_preview'),
                                            imgUploadForm = document.getElementById('img-upload-form'),
                                            totalFiles, previewTitle, previewTitleText, img;

                                        imgUpload.addEventListener('change', previewImgs, false);
                                        imgUploadForm.addEventListener('submit', function(e) {
                                            e.preventDefault();
                                            alert('Images Uploaded! (not really, but it would if this was on your website)');
                                        }, false);

                                        function previewImgs(event) {
                                            totalFiles = imgUpload.files.length;

                                            if (!!totalFiles) {
                                                imgPreview.classList.remove('quote-imgs-thumbs--hidden');
                                           
                                                previewTitle = document.createElement('p');
                                                previewTitle.classList.add("text-center");

                                                previewTitle.style.fontWeight = 'bold';
                                                previewTitleText = document.createTextNode(totalFiles + ' Total Images Selected');
                                                previewTitle.appendChild(previewTitleText);
                                                imgPreview.appendChild(previewTitle);
                                            }

                                            for (var i = 0; i < totalFiles; i++) {
                                                img = document.createElement('img');
                                                img.src = URL.createObjectURL(event.target.files[i]);
                                                img.classList.add('img-preview-thumb');
                                                imgPreview.appendChild(img);
                                            }
                                        }
                                    </script>
                                    {{-- Here is end of gallery --}}

@endsection

