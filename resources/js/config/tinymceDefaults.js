/** TinyMCE tải từ jsDelivr (bản GPL), không phụ thuộc license cloud. */
export const tinymceScriptSrc =
    'https://cdn.jsdelivr.net/npm/tinymce@6.8.5/tinymce.min.js';

const resolveUploadUrl = () => {
    if (typeof window !== 'undefined' && typeof window.route === 'function') {
        try {
            return window.route('editor.upload-image');
        } catch (e) {
            // fall through to relative path
        }
    }

    return '/editor/upload-image';
};

const baseInit = {
    height: 360,
    menubar: true,
    branding: false,
    promotion: false,
    automatic_uploads: true,
    images_upload_credentials: true,
    images_upload_url: resolveUploadUrl(),
    file_picker_types: 'image',
    images_upload_handler: (blobInfo, progress) =>
        new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            xhr.withCredentials = true;
            xhr.open('POST', resolveUploadUrl());
            xhr.setRequestHeader('Accept', 'application/json');
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

            xhr.upload.onprogress = e => {
                progress((e.loaded / e.total) * 100);
            };

            xhr.onload = () => {
                if (xhr.status < 200 || xhr.status >= 300) {
                    reject(`HTTP Error: ${xhr.status}`);
                    return;
                }

                let json = {};
                try {
                    json = JSON.parse(xhr.responseText);
                } catch (err) {
                    reject('Upload response is not valid JSON.');
                    return;
                }

                if (!json.location) {
                    reject('Upload response missing location.');
                    return;
                }

                resolve(json.location);
            };

            xhr.onerror = () => reject('Image upload failed.');

            const formData = new FormData();
            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                ?.getAttribute('content');

            if (csrfToken) {
                formData.append('_token', csrfToken);
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
            }

            formData.append('file', blobInfo.blob(), blobInfo.filename());
            xhr.send(formData);
        }),
    plugins: [
        'advlist',
        'autolink',
        'lists',
        'link',
        'image',
        'charmap',
        'preview',
        'anchor',
        'searchreplace',
        'visualblocks',
        'code',
        'fullscreen',
        'insertdatetime',
        'media',
        'table',
        'help',
        'wordcount',
    ],
    toolbar:
        'undo redo | blocks | bold italic underline strikethrough | forecolor backcolor | ' +
        'alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ' +
        'link image media table | removeformat code fullscreen | help',
    content_style:
        'body { font-family: Helvetica, Arial, sans-serif; font-size: 14px; }',
};

export function createTinyInit(overrides = {}) {
    return { ...baseInit, ...overrides };
}
