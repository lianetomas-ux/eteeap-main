{{-- Email Compose Modal --}}
<div class="modal fade" id="composeEmailModal" tabindex="-1" aria-labelledby="composeEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-3xl overflow-hidden border-0 shadow-2xl">
            {{-- Modal Header --}}
            <div class="animated-gradient px-6 py-5 relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/5 to-transparent"></div>
                <div class="flex items-center justify-between relative z-10">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-[#FFD700]/20 backdrop-blur-xl rounded-xl flex items-center justify-center border border-[#FFD700]/30">
                            <i class="fa fa-envelope text-[#FFD700] text-xl"></i>
                        </div>
                        <div>
                            <h5 class="text-xl font-bold text-white" id="composeEmailModalLabel">Compose Email</h5>
                            <p class="text-white/70 text-sm">Send an email to a user</p>
                        </div>
                    </div>
                    <button type="button" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-xl flex items-center justify-center text-white transition-all" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>

            {{-- Modal Body --}}
            <form action="{{ route('admin.compose.email') }}" method="POST" id="composeEmailForm">
                @csrf
                <div class="p-6 bg-white space-y-5">
                    {{-- Recipient Email --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fa fa-user mr-2 text-[#006633]"></i>Recipient Email <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input 
                                type="email" 
                                name="recipient_email" 
                                id="recipientEmail"
                                class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl text-sm focus:outline-none focus:border-[#006633] focus:ring-4 focus:ring-[#006633]/10 transition-all"
                                placeholder="Enter recipient's email address"
                                required
                                autocomplete="off">
                            {{-- Suggestions dropdown --}}
                            <div id="emailSuggestions" class="absolute z-50 w-full mt-1 bg-white border border-gray-200 rounded-xl shadow-lg hidden max-h-60 overflow-y-auto">
                            </div>
                        </div>
                    </div>

                    {{-- Recipient Name (Optional) --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fa fa-id-card mr-2 text-[#006633]"></i>Recipient Name <span class="text-gray-400 font-normal">(Optional)</span>
                        </label>
                        <input 
                            type="text" 
                            name="recipient_name" 
                            id="recipientName"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl text-sm focus:outline-none focus:border-[#006633] focus:ring-4 focus:ring-[#006633]/10 transition-all"
                            placeholder="Enter recipient's name">
                    </div>

                    {{-- Email Subject --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fa fa-tag mr-2 text-[#006633]"></i>Subject <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            name="email_subject" 
                            id="emailSubject"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl text-sm focus:outline-none focus:border-[#006633] focus:ring-4 focus:ring-[#006633]/10 transition-all"
                            placeholder="Enter email subject"
                            required>
                    </div>

                    {{-- Email Body --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fa fa-align-left mr-2 text-[#006633]"></i>Message <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            name="email_body" 
                            id="emailBody"
                            rows="8"
                            class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl text-sm focus:outline-none focus:border-[#006633] focus:ring-4 focus:ring-[#006633]/10 transition-all resize-none"
                            placeholder="Type your message here..."
                            required></textarea>
                        <p class="text-xs text-gray-500 mt-2">
                            <i class="fa fa-info-circle mr-1"></i>
                            The email will be sent with the CLSU ETEEAP branding.
                        </p>
                    </div>

                    {{-- Quick Templates --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-2">
                            <i class="fa fa-file-alt mr-2 text-[#006633]"></i>Quick Templates
                        </label>
                        <div class="flex flex-wrap gap-2">
                            <button type="button" class="email-template-btn px-3 py-2 bg-gray-100 hover:bg-[#006633]/10 text-gray-700 hover:text-[#006633] rounded-lg text-xs font-semibold transition-all" data-template="follow-up">
                                <i class="fa fa-clock mr-1"></i>Follow-up
                            </button>
                            <button type="button" class="email-template-btn px-3 py-2 bg-gray-100 hover:bg-[#006633]/10 text-gray-700 hover:text-[#006633] rounded-lg text-xs font-semibold transition-all" data-template="requirements">
                                <i class="fa fa-file-text mr-1"></i>Missing Requirements
                            </button>
                            <button type="button" class="email-template-btn px-3 py-2 bg-gray-100 hover:bg-[#006633]/10 text-gray-700 hover:text-[#006633] rounded-lg text-xs font-semibold transition-all" data-template="schedule">
                                <i class="fa fa-calendar mr-1"></i>Schedule Update
                            </button>
                            <button type="button" class="email-template-btn px-3 py-2 bg-gray-100 hover:bg-[#006633]/10 text-gray-700 hover:text-[#006633] rounded-lg text-xs font-semibold transition-all" data-template="inquiry">
                                <i class="fa fa-question-circle mr-1"></i>General Inquiry
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Modal Footer --}}
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex flex-col sm:flex-row justify-end gap-3">
                    <button type="button" class="px-5 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-xl font-semibold text-sm transition-all" data-bs-dismiss="modal">
                        <i class="fa fa-times mr-2"></i>Cancel
                    </button>
                    <button type="submit" class="px-5 py-3 bg-gradient-to-r from-[#006633] to-[#004d26] hover:from-[#005528] hover:to-[#003d1f] text-white rounded-xl font-semibold text-sm transition-all shadow-lg shadow-[#006633]/30 hover:shadow-xl hover:-translate-y-0.5">
                        <i class="fa fa-paper-plane mr-2"></i>Send Email
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Email Compose Modal Scripts --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const recipientEmail = document.getElementById('recipientEmail');
    const recipientName = document.getElementById('recipientName');
    const emailSuggestions = document.getElementById('emailSuggestions');
    const emailSubject = document.getElementById('emailSubject');
    const emailBody = document.getElementById('emailBody');
    
    // Email templates
    const templates = {
        'follow-up': {
            subject: 'Follow-up on Your ETEEAP Application',
            body: `Good day!

We are following up on your ETEEAP application status. Please ensure that all required documents have been submitted.

If you have any questions or need assistance, please don't hesitate to reach out to us.

Thank you for your interest in the CLSU ETEEAP program.

Best regards,
CLSU ETEEAP Administration`
        },
        'requirements': {
            subject: 'Missing Requirements for Your ETEEAP Application',
            body: `Good day!

We have reviewed your ETEEAP application and noticed that some requirements are still missing or incomplete.

Please submit the following documents at your earliest convenience:
• [List of missing documents]

You may upload the documents through your application portal or submit them directly to our office.

If you have any questions, please contact us.

Best regards,
CLSU ETEEAP Administration`
        },
        'schedule': {
            subject: 'Schedule Update - CLSU ETEEAP',
            body: `Good day!

This is to inform you about an update regarding your schedule with the CLSU ETEEAP program.

[Schedule details here]

Please confirm your attendance by replying to this email.

If you have any conflicts with the given schedule, please let us know as soon as possible.

Thank you.

Best regards,
CLSU ETEEAP Administration`
        },
        'inquiry': {
            subject: 'Response to Your Inquiry - CLSU ETEEAP',
            body: `Good day!

Thank you for your inquiry regarding the CLSU ETEEAP program.

[Your response here]

If you have further questions, please don't hesitate to contact us.

Best regards,
CLSU ETEEAP Administration`
        }
    };
    
    // Template button click handlers
    document.querySelectorAll('.email-template-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const templateKey = this.getAttribute('data-template');
            if (templates[templateKey]) {
                emailSubject.value = templates[templateKey].subject;
                emailBody.value = templates[templateKey].body;
            }
        });
    });
    
    // Email autocomplete
    let searchTimeout;
    recipientEmail.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const query = this.value;
        
        if (query.length < 2) {
            emailSuggestions.classList.add('hidden');
            return;
        }
        
        searchTimeout = setTimeout(() => {
            fetch(`{{ route('admin.users.search.email') }}?search=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(users => {
                    if (users.length === 0) {
                        emailSuggestions.classList.add('hidden');
                        return;
                    }
                    
                    emailSuggestions.innerHTML = users.map(user => `
                        <div class="email-suggestion px-4 py-3 hover:bg-[#006633]/5 cursor-pointer transition-all border-b border-gray-100 last:border-0" 
                             data-email="${user.email}" 
                             data-name="${user.name}">
                            <div class="font-semibold text-gray-800">${user.name}</div>
                            <div class="text-sm text-gray-500">${user.email}</div>
                        </div>
                    `).join('');
                    
                    emailSuggestions.classList.remove('hidden');
                    
                    // Add click handlers to suggestions
                    document.querySelectorAll('.email-suggestion').forEach(suggestion => {
                        suggestion.addEventListener('click', function() {
                            recipientEmail.value = this.getAttribute('data-email');
                            recipientName.value = this.getAttribute('data-name');
                            emailSuggestions.classList.add('hidden');
                        });
                    });
                })
                .catch(error => {
                    console.error('Error fetching users:', error);
                    emailSuggestions.classList.add('hidden');
                });
        }, 300);
    });
    
    // Hide suggestions when clicking outside
    document.addEventListener('click', function(e) {
        if (!recipientEmail.contains(e.target) && !emailSuggestions.contains(e.target)) {
            emailSuggestions.classList.add('hidden');
        }
    });
    
    // Pre-fill modal if opened with data attributes
    const composeModal = document.getElementById('composeEmailModal');
    composeModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        if (button) {
            const email = button.getAttribute('data-email');
            const name = button.getAttribute('data-name');
            
            if (email) recipientEmail.value = email;
            if (name) recipientName.value = name;
        }
    });
    
    // Reset form when modal is hidden
    composeModal.addEventListener('hidden.bs.modal', function() {
        document.getElementById('composeEmailForm').reset();
        emailSuggestions.classList.add('hidden');
    });
});
</script>
