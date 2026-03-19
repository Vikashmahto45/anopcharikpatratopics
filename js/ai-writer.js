/**
 * AI Letter Writer Logic
 * Handles dynamic form fields for ai-letter.php submission
 */

document.addEventListener('DOMContentLoaded', () => {
    // Dynamic Topic Options based on Relation
    const relationSelect = document.getElementById('aiRelation');
    const topicSelect = document.getElementById('aiTopic');
    const extraFields = document.getElementById('aiExtraFields');

    if (relationSelect && topicSelect) {
        relationSelect.addEventListener('change', () => {
            const rel = relationSelect.value;
            topicSelect.innerHTML = ''; // Clear

            let options = [];

            // Default "Select" option
            const defaultOpt = document.createElement('option');
            defaultOpt.value = "";
            defaultOpt.innerText = "Select Topic (विषय चुनें)";
            defaultOpt.disabled = true;
            defaultOpt.selected = true;
            topicSelect.appendChild(defaultOpt);

            if (rel === 'father') {
                options = [
                    { val: 'money', text: 'पैसे मँगवाने हेतु (Money)' },
                    { val: 'health', text: 'स्वास्थ्य जानकारी (Health)' },
                    { val: 'general', text: 'सामान्य पत्र (General)' },
                ];
            } else if (rel === 'friend') {
                options = [
                    { val: 'birthday', text: 'जन्मदिन निमंत्रण (Birthday)' },
                    { val: 'vacation', text: 'गर्मी की छुट्टी (Vacation)' },
                    { val: 'congrats', text: 'बधाई पत्र (Congratulations)' },
                    { val: 'general', text: 'सामान्य पत्र (General)' },
                ];
            } else if (rel === 'brother') {
                options = [
                    { val: 'advice', text: 'पढ़ाई की सलाह (Study Advice)' },
                    { val: 'general', text: 'सामान्य पत्र (General)' },
                ];
            } else if (rel === 'custom_relation') {
                options = [
                    { val: 'general', text: 'सामान्य पत्र (General)' },
                ];
            }

            // Add Custom Topic Option to ALL
            options.push({ val: 'custom', text: '✨ Custom Topic (अपना विषय लिखें)' });

            options.forEach(opt => {
                const el = document.createElement('option');
                el.value = opt.val;
                el.innerText = opt.text;
                topicSelect.appendChild(el);
            });

            // Trigger change to update extra fields (clears them)
            topicSelect.dispatchEvent(new Event('change'));
        });

        topicSelect.addEventListener('change', () => {
            const topic = topicSelect.value;
            const rel = relationSelect.value;
            extraFields.innerHTML = ''; // Clear

            // Helper to add input
            const addInput = (id, name, ph, type = 'text') => {
                extraFields.innerHTML += `<input type="${type}" id="${id}" name="${name}" placeholder="${ph}" class="ai-input" required>`;
            };

            // Receiver Name (Friend/Brother)
            if (rel === 'friend' || rel === 'brother') {
                addInput('aiReceiver', 'receiver', "Receiver's Name (मित्र/भाई का नाम)");
            }
            // Custom Relation Name
            if (rel === 'custom_relation') {
                addInput('aiCustomRelationName', 'custom_relation_name', "Write Relation (e.g., Uncle/Teacher)");
            }

            if (topic === 'money') {
                addInput('aiAmount', 'amount', "Amount (₹)", "number");
            } else if (topic === 'custom') {
                extraFields.innerHTML += `<textarea id="aiCustomDetail" name="custom_detail" class="ai-textarea" style="height:100px; margin-bottom:12px;" placeholder="Write your letter content/details here..." required></textarea>`;
            }
        });

        // Trigger initial
        // relationSelect.dispatchEvent(new Event('change'));
    }
});

function copyAiResult() {
    // Legacy function for index.php if needed, or removed
}
