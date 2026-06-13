<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billora</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="d-flex">

    <!-- Sidebar -->
    <aside class="bg-dark text-white vh-100 position-fixed"
           style="width:250px;">

        <div class="p-3 border-bottom">
            <h3 class="m-0">Billora</h3>
            <small class="text-secondary">Restaurant POS</small>
        </div>

        <ul class="nav flex-column p-2">

            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('product_index') }}"
                   class="nav-link text-white">
                    Products
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    Billing
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link text-white">
                    Sales
                </a>
            </li>

        </ul>
    </aside>

    <!-- Main Content -->
    <main class="flex-grow-1 p-4" style="margin-left:250px;">

        <!-- Top Bar -->
        <div class="card shadow-sm mb-4">
            <div class="card-body d-flex justify-content-between align-items-center">

                <h5 class="mb-0">
                    Billora Management
                </h5>

                <div>
                    Welcome, Admin
                </div>

            </div>
        </div>

        @yield('content')

    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>