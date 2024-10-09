(function ($) {
    "use strict";
    var ELEMENT = {};

    ELEMENT.setupCkeditor = () => {
        if ($('.ck-editor')) {
            $('.ck-editor').each(function () {
                let editor = $(this)
                let elementId = editor.attr('id')
                let elementHeight = editor.attr('data-height')
                ELEMENT.ckeditor4(elementId, elementHeight)
            })
        }
    }

    ELEMENT.uploadVideo = () => {
        $(document).on('click', '.upload-video', function (e) {
            ELEMENT.browseServerVideo()
            e.preventDefault()
        })
    }

    ELEMENT.uploadAlbum = () => {
        $(document).on('click', '.upload-picture', function (e) {
            ELEMENT.browseServerAlbum();
            e.preventDefault();
        })
    }

    ELEMENT.multipleUploadImageCkeditor = () => {
        $(document).on('click', '.multipleUploadImageCkeditor', function (e) {
            let object = $(this)
            let target = object.attr('data-target')
            ELEMENT.browseServerCkeditor(object, 'Images', target);
            e.preventDefault()
        })
    }

    ELEMENT.ckeditor4 = (elementId, elementHeight) => {
        if (typeof (elementHeight) == 'undefined') {
            elementHeight = 500;
        }

        CKEDITOR.replace(elementId, {
            height: elementHeight,
            removeButtons: '',
            entities: true,
            allowedContent: true,
            toolbarGroups: [
                { name: 'editing', groups: ['find', 'selection', 'spellchecker', 'undo'] },
                { name: 'links' },
                { name: 'insert' },
                { name: 'forms' },
                { name: 'tools' },
                { name: 'document', groups: ['mode', 'document', 'doctools'] },
                { name: 'others' },
                { name: 'basicstyles', groups: ['basicstyles', 'cleanup', 'colors', 'styles', 'indent'] },
                { name: 'paragraph', groups: ['list', '', 'blocks', 'align', 'bidi'] },
            ],
            removeButtons: 'Save,NewPage,Pdf,Preview,Print,Find,Replace,CreateDiv,SelectAll,Symbol,Block,Button,Language',
            removePlugins: "exportpdf",

        });
    }

    // Hàm để mở CKFinder và cập nhật đường dẫn vào input
    ELEMENT.uploadImageToInput = () => {
        $('.upload-image').click(function () {
            let input = $(this)
            let type = input.attr('data-type')
            ELEMENT.setupCkFinder3(input, type);
        })
    }

    ELEMENT.uploadImageAvatar = () => {
        $('.image-target').click(function () {
            let input = $(this)
            let type = 'Images';
            ELEMENT.browseServerAvatar(input, type);
        })
    }

    // Hàm cài đặt CKFinder
    ELEMENT.setupCkFinder3 = (object, type) => {
        if (typeof(type) == 'undefined') {
            type = 'Images';
        }

        CKFinder.popup({
            chooseFiles: true,
            resourceType: type,
            onInit: function(finder) {
                finder.on('files:choose', function(evt) {
                    var file = evt.data.files.first();
                    object.val(file.getUrl()); // Cập nhật giá trị cho input
                });

                finder.on('file:choose:resizedImage', function(evt) {
                    object.val(evt.data.resizedUrl); // Cập nhật nếu file đã được resize
                });
            }
        });
    }

    // Hàm mở CKFinder và cập nhật ảnh Avatar
    ELEMENT.browseServerAvatar = (object, type) => {
        if (typeof(type) == 'undefined') {
            type = 'Images';
        }

        CKFinder.popup({
            chooseFiles: true,
            resourceType: type,
            onInit: function(finder) {
                finder.on('files:choose', function(evt) {
                    var file = evt.data.files.first();
                    object.find('img').attr('src', file.getUrl());
                    object.siblings('input').val(file.getUrl());
                });

                finder.on('file:choose:resizedImage', function(evt) {
                    object.find('img').attr('src', evt.data.resizedUrl);
                    object.siblings('input').val(evt.data.resizedUrl);
                });
            }
        });
    }

    // Hàm cho CKEditor
    ELEMENT.browseServerCkeditor = (object, type, target) => {
        if (typeof(type) == 'undefined') {
            type = 'Images';
        }

        CKFinder.popup({
            chooseFiles: true,
            resourceType: type,
            onInit: function(finder) {
                finder.on('files:choose', function(evt) {
                    var allFiles = evt.data.files.models;
                    let html = '';
                    for (var i = 0; i < allFiles.length; i++) {
                        var image = allFiles[i].getUrl();
                        html += '<div class="image-content"><figure>';
                        html += '<img src="' + image + '" alt="' + image + '">';
                        html += '<figcaption>Nhập vào mô tả cho ảnh</figcaption>';
                        html += '</figure></div>';
                    }

                    CKEDITOR.instances[target].insertHtml(html);
                });
            }

        });
    }

    // Hàm mở CKFinder cho album
    ELEMENT.browseServerAlbum = () => {
        var type = 'Images';

        CKFinder.popup({
            chooseFiles: true,
            resourceType: type,
            onInit: function(finder) {
                finder.on('files:choose', function(evt) {
                    var allFiles = evt.data.files.models;
                    let html = '';
                    for (var i = 0; i < allFiles.length; i++) {
                        var image = allFiles[i].getUrl();
                        html += '<li class="ui-state-default">';
                        html += '<div class="thumb">';
                        html += '<span class="span image img-scaledown">';
                        html += '<img src="' + image + '" alt="' + image + '">';
                        html += '<input type="hidden" name="gallery[]" value="' + image + '">';
                        html += '</span>';
                        html += '<button class="delete-image"><i class="fa-solid fa-trash"></i></button>';
                        html += '</div>';
                        html += '</li>';
                    }

                    $('.click-to-upload').addClass('hidden');
                    $('#sortable').append(html);
                    $('.upload-list').removeClass('hidden');
                });
            }
        });
    }


    ELEMENT.deletePicture = () => {
        $(document).on('click', '.delete-image', function () {
            let _this = $(this)
            _this.parents('.ui-state-default').remove()
            if ($('.ui-state-default').length == 0) {
                $('.click-to-upload').removeClass('hidden')
                $('.upload-list').addClass('hidden')
            }
        })
    }

    $(document).ready(function () {
        ELEMENT.uploadImageToInput();
        ELEMENT.setupCkeditor();
        ELEMENT.uploadImageAvatar();
        ELEMENT.multipleUploadImageCkeditor();
        ELEMENT.uploadAlbum();
        ELEMENT.deletePicture();
        ELEMENT.uploadVideo();
    });



})(jQuery);
