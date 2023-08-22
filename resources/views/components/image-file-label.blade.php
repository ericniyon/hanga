<label>
    <span class="d-block">{{ $label }}</span>
    <span>
        <span class="text-info small">

        Allowed File types({{ \App\FileManager::ALLOWED_IMAGE_TYPES }})
            ,size ({{ \App\FileManager::DEFAULT_FILE_SIZE_MB }} MB)
        </span>
    </span>
</label>
