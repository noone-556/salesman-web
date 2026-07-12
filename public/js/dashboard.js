document.addEventListener('DOMContentLoaded', () => {
    // Mobile sidebar toggle
    const sidebar = document.querySelector('.sidebar');
    const menuToggle = document.getElementById('menu-toggle');
    if (menuToggle && sidebar) {
        menuToggle.addEventListener('click', () => sidebar.classList.toggle('open'));
    }

    // Sidebar active link on scroll
    const sections = document.querySelectorAll('section[id], main[id]');
    const links = document.querySelectorAll('.sidebar-link');
    window.addEventListener('scroll', () => {
        let current = 'dashboard';
        sections.forEach(section => {
            const top = section.offsetTop - 120;
            if (window.scrollY >= top) current = section.id;
        });
        links.forEach(link => {
            link.classList.toggle('active', link.getAttribute('href') === '#' + current);
        });
    });

    // Customer search & status filter
    const customerSearch = document.getElementById('customer-search');
    const customerStatusFilter = document.getElementById('customer-status-filter');
    const customerRows = document.querySelectorAll('.customer-row');

    function filterCustomers() {
        const query = (customerSearch?.value || '').toLowerCase().trim();
        const status = customerStatusFilter?.value || '';

        customerRows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const rowStatus = row.dataset.status;

            const matchesSearch = text.includes(query);
            const matchesStatus = !status || rowStatus === status;

            row.style.display = (matchesSearch && matchesStatus) ? '' : 'none';
        });
    }

    if (customerSearch) {
        customerSearch.addEventListener('input', filterCustomers);
    }

    if (customerStatusFilter) {
        customerStatusFilter.addEventListener('change', filterCustomers);
    }




    // WhatsApp template buttons
    const preview = document.getElementById('whatsapp-preview');
    document.querySelectorAll('.template-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            if (preview) {
                preview.textContent = btn.dataset.message
                    .replace('{{name}}', 'Ahmad')
                    .replace('{{car}}', 'Perodua Myvi 1.5 AV');
            }
        });
    });

    // Caption generator
    const capGenerate = document.getElementById('cap-generate');
    const capCopy = document.getElementById('cap-copy');
    const capOutput = document.getElementById('cap-output');

    function generateCaption() {
        const model = document.getElementById('cap-model')?.value || '';
        const year = document.getElementById('cap-year')?.value || '';
        const price = Number(document.getElementById('cap-price')?.value || 0);
        const mileage = Number(document.getElementById('cap-mileage')?.value || 0);
        const features = document.getElementById('cap-features')?.value || '';

        const formattedPrice = price.toLocaleString('en-MY');
        const formattedMileage = mileage.toLocaleString('en-MY');

        return `🔥 ${year} ${model} — RM ${formattedPrice}

✅ Mileage: ${formattedMileage} km
✅ ${features}

💰 Price: RM ${formattedPrice}
📍 Ready stock — fast loan approval
📲 WhatsApp for viewing appointment

#${model.split(' ')[0]} #Recon #Malaysia #CarForSale #${year}Model`;
    }

    if (capGenerate) {
        capGenerate.addEventListener('click', () => {
            if (capOutput) capOutput.value = generateCaption();
        });
    }

    if (capCopy && capOutput) {
        capCopy.addEventListener('click', () => {
            if (!capOutput.value) capOutput.value = generateCaption();
            navigator.clipboard.writeText(capOutput.value);
            capCopy.textContent = 'Copied!';
            setTimeout(() => { capCopy.textContent = 'Copy'; }, 1500);
        });
    }

    // Loan calculator
    const loanInputs = ['loan-price', 'loan-down', 'loan-tenure', 'loan-rate'];
    const quoteCustomer = document.getElementById('quote-customer');

    function calculateLoan() {
        const price = Number(document.getElementById('loan-price')?.value || 0);
        const downPct = Number(document.getElementById('loan-down')?.value || 0);
        const tenure = Number(document.getElementById('loan-tenure')?.value || 108);
        const rate = Number(document.getElementById('loan-rate')?.value || 3.2) / 100 / 12;

        const downPayment = price * (downPct / 100);
        const principal = price - downPayment;
        let monthly = 0;
        let totalInterest = 0;

        if (rate > 0 && tenure > 0) {
            monthly = principal * (rate * Math.pow(1 + rate, tenure)) / (Math.pow(1 + rate, tenure) - 1);
            totalInterest = (monthly * tenure) - principal;
        } else if (tenure > 0) {
            monthly = principal / tenure;
        }

        const fmt = n => 'RM ' + Math.round(n).toLocaleString('en-MY');

        document.getElementById('loan-monthly').textContent = fmt(monthly);
        document.getElementById('loan-amount').textContent = fmt(principal);
        document.getElementById('loan-interest').textContent = fmt(totalInterest);
        document.getElementById('quote-loan').textContent = fmt(principal);
        document.getElementById('quote-monthly').textContent = fmt(monthly);
        document.getElementById('quote-tenure').textContent = tenure + ' months';
    }

    loanInputs.forEach(id => {
        const el = document.getElementById(id);
        if (el) el.addEventListener('input', calculateLoan);
    });

    if (quoteCustomer) {
        quoteCustomer.addEventListener('input', () => {
            const display = document.getElementById('quote-customer-display');
            if (display) display.textContent = quoteCustomer.value;
        });
    }

    // Initial runs
    if (capOutput) capOutput.value = generateCaption();
    calculateLoan();
});
