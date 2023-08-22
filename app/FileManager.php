<?php


namespace App;


class FileManager
{

    const DEFAULT_FILE_SIZE = 2000;
    const DEFAULT_FILE_SIZE_MB = 2;

    private const DSP_PATH = 'dsp/';
    const DSP_RDB_CERTIFICATE_PATH = self::DSP_PATH . 'certificates';
    const DSP_LOGO_PATH = self::DSP_PATH . 'logo';
    const DSP_PRODUCT_LOGO_PATH = self::DSP_PATH . 'products/logo';

    private const MSME_PATH = 'msme/';
    const MSME_RDB_CERTIFICATE_PATH = self::MSME_PATH . 'certificates';
    const MSME_LOGO_PATH = self::MSME_PATH . 'logo';

    private const IWORKER_PATH = 'iworker/';
    const IWORKER_DOCS_PATH = self::IWORKER_PATH . 'supporting_documents';
    const IWORKER_PROFILE_PIC_PATH = self::IWORKER_PATH . 'profile_picture';
    const IWORKER_LOGO_PATH = self::IWORKER_PATH . 'logo';
    const IWORKER_RDB_CERTIFICATE_PATH = self::IWORKER_PATH . 'certificates';

    const WEBINAR_IMAGES_PATH = 'webinars/photos';
    const WEBINAR_ATTACHMENT_PATH = 'webinars/attachments';

    const ALLOWED_DOC_FILES = 'doc,docx,jpg,jpeg,png,pdf';

    const OPEN_API_LOGO_PATH = 'open_apis/logo';

    const DEFAULT_ALLOWED_FILE_TYPES = 'mimes:doc,docx,jpg,jpeg,png,pdf';

    const ALLOWED_IMAGE_TYPES = 'jpg,jpeg,png';

    const OPPORTUNITY_ATTACHMENT_PATH='opportunities/attachments';
    const OPPORTUNITY_LOGO_PATH='opportunities/logo';

    static function deleteFile($path, $filename)
    {
        \Storage::delete(\Storage::url($path . $filename));
    }


}
