<x-modal id="modal-carte-payment">
    <x-slot name="title">{{ _('Paiement') }}</x-slot>
    <x-slot name="size">modal-lg</x-slot>
    <x-slot name="body" class="w3-padding-24">
        <div class="w3-border w3-center">
            <span>Montant total à payer:</span>
            <label class="display-3">{{ $amount }}</label>€/an
        </div>
        <form id="payment-form">
            <label for="payment-element">Payment details</label>
            <div id="payment-element">
                <!-- Elements will create input elements here -->
            </div>

            <!-- We'll put the error messages in this element -->
            <div id="payment-errors" role="alert"></div>

            <button id="submit" class="btn btn-primary mt-2">Payer</button>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ _('Fermer') }}</button>
    </x-slot>
</x-modal>
