<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Send Slack Message</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

<div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Send Slack Message</h1>

    <form id="slackForm">
        <div class="mb-4">
            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">
                Message
            </label>
            <textarea
                id="message"
                rows="5"
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                placeholder="Type your message here..."
                required
            ></textarea>
        </div>

        <button
            type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200"
        >
            Send Message
        </button>
    </form>
</div>

<!-- Toast Container -->
<div id="toast" class="fixed top-4 right-4 hidden">
    <div class="bg-white rounded-lg shadow-lg p-4 flex items-center space-x-3 max-w-sm">
        <div id="toastIcon"></div>
        <p id="toastMessage" class="text-gray-800"></p>
    </div>
</div>

<script>
    const form = document.getElementById('slackForm');
    const toast = document.getElementById('toast');
    const toastIcon = document.getElementById('toastIcon');
    const toastMessage = document.getElementById('toastMessage');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const message = document.getElementById('message').value;

        try {
            const response = await fetch("{{route('slack.store')}}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                },
                body: JSON.stringify({ message })
            });

            if (response.ok) {
                showToast('Message sent successfully!', 'success');
                form.reset();
            } else {
                showToast('Failed to send message', 'error');
            }
        } catch (error) {
            showToast('Network error occurred', 'error');
        }
    });

    function showToast(message, type) {
        toastMessage.textContent = message;

        if (type === 'success') {
            toastIcon.innerHTML = `
                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                `;
        } else {
            toastIcon.innerHTML = `
                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                `;
        }

        toast.classList.remove('hidden');

        setTimeout(() => {
            toast.classList.add('hidden');
        }, 3000);
    }
</script>
</body>
</html>
