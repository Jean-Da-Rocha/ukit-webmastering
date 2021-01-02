<div>
    <div id="modal-remove" class="uk-modal" data-uk-modal>
        <div class="uk-modal-dialog uk-modal-body">
            <button class="uk-modal-close-default" type="button" data-uk-close></button>
            <h2 class="uk-modal-title">Confirmation modal</h2>
            <p>Are you sure you want to delete this item ?</p>
            <p class="uk-text-right">
                <button
                    class="uk-button uk-button-secondary uk-modal-close"
                    type="button"
                >
                    Cancel
                </button>
                <button
                    class="uk-button uk-button-danger uk-modal-close"
                    type="button"
                    wire:click="delete()"
                >
                    Remove
                </button>
            </p>
        </div>
    </div>
</div>
