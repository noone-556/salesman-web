{{-- Customer Profile Modal --}}
<div id="customer-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 px-4">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6 relative">
        <button id="modal-close" type="button" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>

        <div class="flex items-center gap-3 mb-4">
            <!-- <div class="w-12 h-12 rounded-full bg-brand-500 text-white flex items-center justify-center text-lg font-semibold" id="modal-avatar">
                A
            </div> -->
            <div>
                <h3 class="font-semibold text-slate-900 text-lg" id="modal-name">Customer Name</h3>
                <span class="status-badge" id="modal-status">Status</span>
            </div>
        </div>

        <div class="space-y-3 text-sm border-t border-slate-100 pt-4">
            <div class="flex justify-between">
                <span class="text-slate-500">Phone</span>
                <span class="font-medium text-slate-900" id="modal-phone">-</span>
            </div>
            <div class="flex justify-between">
                <span class="text-slate-500">Car Interest</span>
                <span class="font-medium text-slate-900" id="modal-car">-</span>
            </div>
            <div class="flex justify-between">
                <span class="text-slate-500">Last Contact</span>
                <span class="font-medium text-slate-900" id="modal-last-contact">-</span>
            </div>
        </div>

        <!-- <div class="flex gap-2 mt-6">
            <button type="button" class="flex-1 border border-slate-200 hover:bg-slate-50 text-sm font-medium py-2.5 rounded-lg transition">
                Edit
            </button>
            <button type="button" class="flex-1 bg-brand-600 hover:bg-brand-700 text-white text-sm font-medium py-2.5 rounded-lg transition">
                Message
            </button>
        </div> -->
    </div>
</div>