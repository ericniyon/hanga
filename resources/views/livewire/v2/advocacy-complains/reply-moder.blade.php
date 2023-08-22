<div>
    <form wire:submit.prevent="storeReply">
        @csrf
            <div class="my-4" >

                <textarea wire:ignore.self wire:model.defer="replyMessage" id="replyModel"
                class="form-control rounded-0 border-2 border-info placeholder-dark" rows="8"
                placeholder="{{ __("write your reply") }}"></textarea>
            </div>

            <div class="my-4">
                <button type="submit" class="btn btn-info rounded-pill w-100">
                    {{ __("app.send") }}
                </button>
            </div>

    </form>
</div>
