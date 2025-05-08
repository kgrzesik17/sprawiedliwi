@extends('layouts.main')

<script src="https://cdn.ckeditor.com/ckeditor5/31.1.0/classic/ckeditor.js"></script>

@section('content')
    <div id="edit-container">
        <h2><a href="{{ route('panel') }}">←Powrót do panelu</a></h2>
        <h1>Nowy post</h1>
    </div>


    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <input id="edit-title" name="title" type="text" placeholder="Tytuł artykułu">

            <select name="category_id" id="category_id">
                {{-- <option value="{{ $post->category->id }}">{{ $post->category->category_name }}</option> --}}

                @foreach(App\Models\Category::all() as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <div id="edit-content-container">
            <textarea name="content" id="edit-content" cols="60" rows="20"></textarea>
        </div>

        <div id="input-file-container">
            <input type="file" name="input_file" id="input_file">
        </div>

        <div>
            <input type="submit" class="button" value="Dodaj">
        </form>
        </div>

        <script>

            class MyUploadAdapter {
              // ...
              constructor( loader ) {
                      // The file loader instance to use during the upload. It sounds scary but do not
                      // worry — the loader will be passed into the adapter later on in this guide.
                      this.loader = loader;
                  }
              // Starts the upload process.
              upload() {
                  return this.loader.file
                      .then( file => new Promise( ( resolve, reject ) => {
                          this._initRequest();
                          this._initListeners( resolve, reject, file );
                          this._sendRequest( file );
                      } ) );
              }

              // Aborts the upload process.
              abort() {
                  if ( this.xhr ) {
                      this.xhr.abort();
                  }
              }

              _initRequest() {
                      const xhr = this.xhr = new XMLHttpRequest();

                      // Note that your request may look different. It is up to you and your editor
                      // integration to choose the right communication channel. This example uses
                      // a POST request with JSON as a data structure but your configuration
                      // could be different.
                      xhr.setRequestHeader('x-csrf-token', '{{ csrf_token() }}');
                      xhr.responseType = 'json';
                  }

                  _initListeners( resolve, reject, file ) {
                          const xhr = this.xhr;
                          const loader = this.loader;
                          const genericErrorText = `Couldn't upload file: ${ file.name }.`;

                          xhr.addEventListener( 'error', () => reject( genericErrorText ) );
                          xhr.addEventListener( 'abort', () => reject() );
                          xhr.addEventListener( 'load', () => {
                              const response = xhr.response;

                              // This example assumes the XHR server's "response" object will come with
                              // an "error" which has its own "message" that can be passed to reject()
                              // in the upload promise.
                              //
                              // Your integration may handle upload errors in a different way so make sure
                              // it is done properly. The reject() function must be called when the upload fails.
                              if ( !response || response.error ) {
                                  return reject( response && response.error ? response.error.message : genericErrorText );
                              }

                              // If the upload is successful, resolve the upload promise with an object containing
                              // at least the "default" URL, pointing to the image on the server.
                              // This URL will be used to display the image in the content. Learn more in the
                              // UploadAdapter#upload documentation.
                              resolve( {
                                  default: response.url
                              } );
                          } );

                          // Upload progress when it is supported. The file loader has the #uploadTotal and #uploaded
                          // properties which are used e.g. to display the upload progress bar in the editor
                          // user interface.
                          if ( xhr.upload ) {
                              xhr.upload.addEventListener( 'progress', evt => {
                                  if ( evt.lengthComputable ) {
                                      loader.uploadTotal = evt.total;
                                      loader.uploaded = evt.loaded;
                                  }
                              } );
                          }
                      }

                      _sendRequest( file ) {
                              // Prepare the form data.
                              const data = new FormData();

                              data.append( 'upload', file );

                              // Important note: This is the right place to implement security mechanisms
                              // like authentication and CSRF protection. For instance, you can use
                              // XMLHttpRequest.setRequestHeader() to set the request headers containing
                              // the CSRF token generated earlier by your application.

                              // Send the request.
                              this.xhr.send( data );
                          }

              // ...
            }

            function SimpleUploadAdapterPlugin( editor ) {
              editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                  // Configure the URL to the upload script in your back-end here!
                  return new MyUploadAdapter( loader );
              };
            }

            ClassicEditor
            .create( document.querySelector( '#edit-content' ), {
            extraPlugins: [ SimpleUploadAdapterPlugin ],

            } )
            .catch( error => {
            console.error( error );
            } );
            </script>
@endsection
