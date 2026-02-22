<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Welcome, {{ auth()->user()->name }}
        </h2>
    </x-slot>

    <div class="py-10 bg-light min-vh-100">

        <div class="container">

            <!-- Welcome Section -->
            <div class="row mb-4">

                <div class="col-md-12">

                    <div class="card border-0 shadow-lg rounded-4 p-4"
                         style="background: linear-gradient(135deg, #4f46e5, #9333ea); color:white;">

                        <h3 class="fw-bold mb-2">
                            🤖 InfiCode AI Dashboard
                        </h3>

                        <p class="mb-0 opacity-75">
                            Your personal AI assistant for coding, questions, and productivity.
                        </p>

                    </div>

                </div>

            </div>


            <!-- Chat Card -->
            <div class="row">

                <div class="col-md-6">

                    <a href="{{ route('chat.index') }}"
                       class="text-decoration-none">

                        <div class="card border-0 shadow-lg rounded-4 p-4 chat-card">

                            <div class="d-flex align-items-center">

                                <div class="chat-logo me-3">
                                    💬
                                </div>

                                <div>
                                    <h4 class="fw-bold mb-1">
                                        Chat with InfiCode AI
                                    </h4>

                                    <p class="text-muted mb-0">
                                        Ask coding questions, get help instantly
                                    </p>
                                </div>

                            </div>

                        </div>

                    </a>

                </div>


                <!-- Profile Card -->
                <div class="col-md-6">

                    <div class="card border-0 shadow-lg rounded-4 p-4">

                        <h5 class="fw-bold mb-3">
                            Your Profile
                        </h5>

                        <p class="mb-1">
                            <strong>Name:</strong> {{ auth()->user()->name }}
                        </p>

                        <p class="mb-1">
                            <strong>Email:</strong> {{ auth()->user()->email }}
                        </p>

                        <p class="mb-0">
                            <strong>Status:</strong>
                            <span class="badge bg-success">
                                Active
                            </span>
                        </p>

                    </div>

                </div>

            </div>


        </div>

    </div>


<style>

.chat-card {

    transition: 0.3s;
    cursor: pointer;
    background: white;

}

.chat-card:hover {

    transform: translateY(-5px) scale(1.02);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);

}

.chat-logo {

    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #6366f1, #9333ea);
    color: white;
    font-size: 28px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 15px;

}

</style>


</x-app-layout>
