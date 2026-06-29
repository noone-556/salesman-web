@extends('layouts.app')

@section('title', 'Dashboard — AutoSales Pro')

@section('content')
<div class="flex min-h-screen">

    {{-- Sidebar --}}
    <aside class="sidebar fixed lg:static inset-y-0 left-0 z-30 w-64 bg-navy-900 text-slate-300 flex flex-col transition-transform duration-200">
        <div class="px-6 py-5 border-b border-slate-700">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-lg bg-brand-500 flex items-center justify-center text-white font-bold text-sm">AS</div>
                <div>
                    <p class="text-white font-semibold text-sm">AutoSales Pro</p>
                    <p class="text-xs text-slate-400">Car Sales Dashboard</p>
                </div>
            </div>
        </div>

        <nav class="flex-1 px-3 py-4 space-y-1 text-sm">
            <a href="#dashboard" class="sidebar-link active flex items-center gap-3 px-3 py-2.5 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6z"/></svg>
                Dashboard
            </a>
            <a href="#crm" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0"/></svg>
                CRM Customers
            </a>
            <a href="#whatsapp" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                WhatsApp Follow-up
            </a>
            <a href="#caption" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                Caption Generator
            </a>
            <a href="#loan" class="sidebar-link flex items-center gap-3 px-3 py-2.5 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                Loan & Quotation
            </a>
        </nav>

        <div class="px-4 py-4 border-t border-slate-700 text-xs text-slate-500">
            Prototype v0.1 · Blade UI
        </div>
    </aside>

    {{-- Main --}}
    <div class="flex-1 lg:ml-0 min-w-0">

        {{-- Top bar --}}
        <header class="sticky top-0 z-20 bg-white border-b border-slate-200 px-4 lg:px-8 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <button id="menu-toggle" class="lg:hidden p-2 rounded-lg hover:bg-slate-100">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </button>
                <div>
                    <h1 class="text-lg font-semibold text-slate-900">Dashboard</h1>
                    <p class="text-xs text-slate-500">{{ now()->format('l, d M Y') }}</p>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <button class="relative p-2 rounded-lg hover:bg-slate-100 text-slate-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-brand-500 text-white flex items-center justify-center text-sm font-semibold">AS</div>
                    <span class="hidden sm:block text-sm font-medium">Ahmad S.</span>
                </div>
            </div>
        </header>

        <main class="p-4 lg:p-8 space-y-8" id="dashboard">

            {{-- Stats --}}
            <section class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="panel-card p-5">
                    <p class="text-xs font-medium text-slate-500 uppercase tracking-wide">Follow-ups Due</p>
                    <p class="text-3xl font-bold text-slate-900 mt-1">{{ $stats['followups_due'] }}</p>
                    <p class="text-xs text-amber-600 mt-1">Today</p>
                </div>
                <div class="panel-card p-5">
                    <p class="text-xs font-medium text-slate-500 uppercase tracking-wide">Active Leads</p>
                    <p class="text-3xl font-bold text-slate-900 mt-1">{{ $stats['active_leads'] }}</p>
                    <p class="text-xs text-brand-600 mt-1">+5 this week</p>
                </div>
                <div class="panel-card p-5">
                    <p class="text-xs font-medium text-slate-500 uppercase tracking-wide">Cars Listed</p>
                    <p class="text-3xl font-bold text-slate-900 mt-1">{{ $stats['cars_listed'] }}</p>
                    <p class="text-xs text-slate-500 mt-1">This week</p>
                </div>
                <div class="panel-card p-5">
                    <p class="text-xs font-medium text-slate-500 uppercase tracking-wide">Pipeline</p>
                    <p class="text-3xl font-bold text-slate-900 mt-1">RM {{ $stats['pipeline'] }}</p>
                    <p class="text-xs text-slate-500 mt-1">Estimated value</p>
                </div>
            </section>

            {{-- CRM + WhatsApp row --}}
            <div class="grid lg:grid-cols-5 gap-6">

                {{-- CRM --}}
                <section id="crm" class="lg:col-span-3 panel-card">
                    <div class="px-5 py-4 border-b border-slate-100 flex flex-wrap items-center justify-between gap-3">
                        <h2 class="font-semibold text-slate-900">Customer List</h2>
                        <div class="flex gap-2">
                            <input type="search" placeholder="Search customers..." class="text-sm border border-slate-200 rounded-lg px-3 py-1.5 w-40 focus:outline-none focus:ring-2 focus:ring-brand-500">
                            <select class="text-sm border border-slate-200 rounded-lg px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-brand-500">
                                <option>All Status</option>
                                <option>Hot</option>
                                <option>Warm</option>
                                <option>Follow-up Due</option>
                                <option>Cold</option>
                            </select>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-slate-50 text-slate-500 text-left">
                                <tr>
                                    <th class="px-5 py-3 font-medium">Name</th>
                                    <th class="px-5 py-3 font-medium">Phone</th>
                                    <th class="px-5 py-3 font-medium">Car Interest</th>
                                    <th class="px-5 py-3 font-medium">Status</th>
                                    <th class="px-5 py-3 font-medium">Last Contact</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @foreach ($customers as $customer)
                                <tr class="hover:bg-slate-50">
                                    <td class="px-5 py-3 font-medium">{{ $customer['name'] }}</td>
                                    <td class="px-5 py-3 text-slate-500">{{ $customer['phone'] }}</td>
                                    <td class="px-5 py-3">{{ $customer['car'] }}</td>
                                    <td class="px-5 py-3">
                                        <span class="status-badge status-{{ $customer['status'] }}">
                                            {{ str_replace('_', ' ', ucfirst($customer['status'])) }}
                                        </span>
                                    </td>
                                    <td class="px-5 py-3 text-slate-500">{{ $customer['last_contact'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>

                {{-- WhatsApp --}}
                <section id="whatsapp" class="lg:col-span-2 panel-card flex flex-col">
                    <div class="px-5 py-4 border-b border-slate-100">
                        <h2 class="font-semibold text-slate-900">WhatsApp Follow-up</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Due today & template sender</p>
                    </div>

                    <div class="px-5 py-3 space-y-2 flex-1 overflow-y-auto max-h-48">
                        @foreach ($followups as $item)
                        <div class="flex items-center justify-between p-3 rounded-lg {{ $item['urgent'] ? 'bg-red-50 border border-red-100' : 'bg-slate-50' }}">
                            <div>
                                <p class="text-sm font-medium">{{ $item['name'] }}</p>
                                <p class="text-xs text-slate-500">{{ $item['car'] }}</p>
                            </div>
                            <span class="text-xs font-medium {{ $item['urgent'] ? 'text-red-600' : 'text-amber-600' }}">{{ $item['due'] }}</span>
                        </div>
                        @endforeach
                    </div>

                    <div class="px-5 py-3 border-t border-slate-100">
                        <p class="text-xs font-medium text-slate-500 mb-2">Quick Templates</p>
                        <div class="flex flex-wrap gap-2">
                            @foreach ($templates as $template)
                            <button
                                type="button"
                                class="template-btn text-xs px-3 py-1.5 rounded-full border border-slate-200 hover:border-brand-500 hover:text-brand-600 transition"
                                data-message="{{ $template['message'] }}"
                            >{{ $template['label'] }}</button>
                            @endforeach
                        </div>
                    </div>

                    <div class="px-5 py-4 border-t border-slate-100">
                        <p class="text-xs font-medium text-slate-500 mb-2">Message Preview</p>
                        <div class="whatsapp-bubble p-3 text-sm text-slate-800" id="whatsapp-preview">
                            Hi Ahmad! Good news — the Perodua Myvi you enquired about now has a special price. Interested to view this weekend?
                        </div>
                        <button type="button" class="mt-3 w-full bg-brand-600 hover:bg-brand-700 text-white text-sm font-medium py-2.5 rounded-lg transition">
                            Send Reminder
                        </button>
                    </div>
                </section>
            </div>

            {{-- Caption + Loan row --}}
            <div class="grid lg:grid-cols-2 gap-6">

                {{-- Caption Generator --}}
                <section id="caption" class="panel-card">
                    <div class="px-5 py-4 border-b border-slate-100">
                        <h2 class="font-semibold text-slate-900">Listing Caption Generator</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Generate social media & marketplace listings</p>
                    </div>
                    <div class="p-5 space-y-4">
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="text-xs font-medium text-slate-600">Make / Model</label>
                                <input id="cap-model" type="text" value="Perodua Myvi 1.5 AV" class="mt-1 w-full text-sm border border-slate-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">
                            </div>
                            <div>
                                <label class="text-xs font-medium text-slate-600">Year</label>
                                <input id="cap-year" type="number" value="2022" class="mt-1 w-full text-sm border border-slate-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">
                            </div>
                            <div>
                                <label class="text-xs font-medium text-slate-600">Price (RM)</label>
                                <input id="cap-price" type="number" value="58000" class="mt-1 w-full text-sm border border-slate-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">
                            </div>
                            <div>
                                <label class="text-xs font-medium text-slate-600">Mileage (km)</label>
                                <input id="cap-mileage" type="number" value="45000" class="mt-1 w-full text-sm border border-slate-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">
                            </div>
                        </div>
                        <div>
                            <label class="text-xs font-medium text-slate-600">Features</label>
                            <input id="cap-features" type="text" value="Full service record, single owner, accident free" class="mt-1 w-full text-sm border border-slate-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">
                        </div>
                        <div>
                            <label class="text-xs font-medium text-slate-600 mb-2 block">Platforms</label>
                            <div class="flex flex-wrap gap-2">
                                <label class="inline-flex items-center gap-1.5 text-xs px-3 py-1.5 rounded-full bg-brand-50 text-brand-700 border border-brand-200 cursor-pointer"><input type="checkbox" checked class="rounded"> Facebook</label>
                                <label class="inline-flex items-center gap-1.5 text-xs px-3 py-1.5 rounded-full bg-slate-50 border border-slate-200 cursor-pointer"><input type="checkbox" checked class="rounded"> Mudah.my</label>
                                <label class="inline-flex items-center gap-1.5 text-xs px-3 py-1.5 rounded-full bg-slate-50 border border-slate-200 cursor-pointer"><input type="checkbox" checked class="rounded"> Carlist.my</label>
                            </div>
                        </div>
                        <div>
                            <label class="text-xs font-medium text-slate-600">Generated Caption</label>
                            <textarea id="cap-output" rows="5" readonly class="mt-1 w-full text-sm border border-slate-200 rounded-lg px-3 py-2 bg-slate-50 focus:outline-none"></textarea>
                        </div>
                        <div class="flex gap-2">
                            <button type="button" id="cap-generate" class="flex-1 bg-brand-600 hover:bg-brand-700 text-white text-sm font-medium py-2.5 rounded-lg transition">Generate Caption</button>
                            <button type="button" id="cap-copy" class="px-4 border border-slate-200 hover:bg-slate-50 text-sm font-medium py-2.5 rounded-lg transition">Copy</button>
                        </div>
                    </div>
                </section>

                {{-- Loan & Quotation --}}
                <section id="loan" class="panel-card">
                    <div class="px-5 py-4 border-b border-slate-100">
                        <h2 class="font-semibold text-slate-900">Loan Calculator & Quotation</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Calculate installment & preview quotation</p>
                    </div>
                    <div class="p-5 space-y-4">
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="text-xs font-medium text-slate-600">Car Price (RM)</label>
                                <input id="loan-price" type="number" value="85000" class="mt-1 w-full text-sm border border-slate-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">
                            </div>
                            <div>
                                <label class="text-xs font-medium text-slate-600">Down Payment (%)</label>
                                <input id="loan-down" type="number" value="10" min="0" max="100" class="mt-1 w-full text-sm border border-slate-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">
                            </div>
                            <div>
                                <label class="text-xs font-medium text-slate-600">Loan Tenure (months)</label>
                                <select id="loan-tenure" class="mt-1 w-full text-sm border border-slate-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">
                                    <option value="60">60 months (5 years)</option>
                                    <option value="84">84 months (7 years)</option>
                                    <option value="108" selected>108 months (9 years)</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-xs font-medium text-slate-600">Interest Rate (% p.a.)</label>
                                <input id="loan-rate" type="number" value="3.2" step="0.1" class="mt-1 w-full text-sm border border-slate-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-3">
                            <div class="bg-brand-50 rounded-lg p-3 text-center">
                                <p class="text-xs text-brand-600 font-medium">Monthly</p>
                                <p id="loan-monthly" class="text-lg font-bold text-brand-800">RM 892</p>
                            </div>
                            <div class="bg-slate-50 rounded-lg p-3 text-center">
                                <p class="text-xs text-slate-500 font-medium">Loan Amount</p>
                                <p id="loan-amount" class="text-lg font-bold text-slate-800">RM 76,500</p>
                            </div>
                            <div class="bg-slate-50 rounded-lg p-3 text-center">
                                <p class="text-xs text-slate-500 font-medium">Total Interest</p>
                                <p id="loan-interest" class="text-lg font-bold text-slate-800">RM 19,836</p>
                            </div>
                        </div>

                        <div>
                            <label class="text-xs font-medium text-slate-600">Customer Name</label>
                            <input id="quote-customer" type="text" value="Ahmad Zaki bin Hassan" class="mt-1 w-full text-sm border border-slate-200 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-brand-500">
                        </div>

                        <div class="border border-slate-200 rounded-lg p-4 bg-white text-sm" id="quote-preview">
                            <div class="text-center border-b border-slate-100 pb-3 mb-3">
                                <p class="font-bold text-slate-900">AutoSales Pro — Quotation</p>
                                <p class="text-xs text-slate-500">{{ now()->format('d/m/Y') }}</p>
                            </div>
                            <p class="text-xs text-slate-500">Customer: <span id="quote-customer-display">Ahmad Zaki bin Hassan</span></p>
                            <p class="text-xs text-slate-500 mt-1">Vehicle: Honda City RS · RM 85,000</p>
                            <div class="mt-3 space-y-1 text-xs">
                                <div class="flex justify-between"><span>Down payment (10%)</span><span>RM 8,500</span></div>
                                <div class="flex justify-between"><span>Loan amount</span><span id="quote-loan">RM 76,500</span></div>
                                <div class="flex justify-between"><span>Tenure</span><span id="quote-tenure">108 months</span></div>
                                <div class="flex justify-between font-semibold text-brand-700 border-t border-slate-100 pt-2 mt-2"><span>Monthly installment</span><span id="quote-monthly">RM 892</span></div>
                            </div>
                        </div>

                        <div class="flex gap-2">
                            <button type="button" class="flex-1 border border-slate-200 hover:bg-slate-50 text-sm font-medium py-2.5 rounded-lg transition">Export PDF</button>
                            <button type="button" class="flex-1 bg-brand-600 hover:bg-brand-700 text-white text-sm font-medium py-2.5 rounded-lg transition">Send to Customer</button>
                        </div>
                    </div>
                </section>
            </div>

        </main>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/dashboard.js') }}"></script>
@endpush
