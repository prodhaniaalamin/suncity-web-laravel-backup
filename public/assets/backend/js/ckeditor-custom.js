var containerForm, uploadFiles = [], ckeditorFiles;

class MyUploadAdapter {
    constructor(loader) {
        // The file loader instance to use during the upload.
        this.loader = loader;
    }

    // Starts the upload process.
    upload() {
        return this.loader.file
            .then(file => new Promise((resolve, reject) => {
                this._initRequest();
                this._initListeners(resolve, reject, file);
                this._sendRequest(file);
            }));
    }

    // Aborts the upload process.
    abort() {
        if (this.xhr) {
            this.xhr.abort();
        }
    }

    _initRequest() {
        const xhr = this.xhr = new XMLHttpRequest();

        xhr.open('POST', `${asset}file-upload-from-ckeditor`, true);
        xhr.setRequestHeader('x-csrf-token', _token);
        xhr.responseType = 'json';
    }

    // Initializes XMLHttpRequest listeners.
    _initListeners(resolve, reject, file) {
        const xhr = this.xhr;
        const loader = this.loader;
        const genericErrorText = `Couldn't upload file: ${file.name}.`;

        xhr.addEventListener('load', () => {
            const response = xhr.response;

            if (!response || response.error) {
                return reject(response && response.error ? response.error.message : genericErrorText);
            }
            resolve({
                default: response.url
            });
            garbageFileCatch(response.url);
        });

        if (xhr.upload) {
            xhr.upload.addEventListener('progress', evt => {
                if (evt.lengthComputable) {
                    loader.uploadTotal = evt.total;
                    loader.uploaded = evt.loaded;
                }
            });
        }
    }

    // Prepares the data and sends the request.
    _sendRequest(file) {
        // Prepare the form data.
        const data = new FormData();

        data.append('upload', file);

        // Send the request.
        this.xhr.send(data);
    }
}

function MyCustomUploadAdapterPlugin(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
        return new MyUploadAdapter(loader);
    };
}


function ckeditorLoad() {
    $('.ck-editor').each((i, el) => el.remove());
    let editors = document.querySelectorAll('[data-text-editor="ckEditor"]');
    editors && editors.forEach(function (editor) {
        editorReinitialize(editor);
    });
}

ckeditorLoad();

function editorReinitialize(editor, value) {
    if (!editor) return false;

    if (value) {
        editor.innerText = value === true ? '' : value;
        $(editor).parent().find('.ck.ck-reset.ck-editor').remove();
    }

    containerForm = editor.form;
    ckeditorFiles = containerForm.querySelector('input[name="ckeditorFiles"]');
    if (!ckeditorFiles) {
        $(containerForm).append('<input name="ckeditorFiles" type="hidden">');
        ckeditorFiles = $(containerForm).find('input[name="ckeditorFiles"]')[0];
    }
    ClassicEditor.create(editor, {
        extraPlugins: [MyCustomUploadAdapterPlugin]
    }).catch(error => {
        console.error(error);
    });

    setTimeout(() => $(editor).parent().find('img').each((i, img) => garbageFileCatch(img.src)), 10)
}

function garbageFileCatch(fileSrc) {
    let fileName = fileSrc.replace(asset, '');
    if (!uploadFiles.includes(fileName)) {
        uploadFiles.push(fileName);
        ckeditorFiles.value = uploadFiles.join(',');
    }
}